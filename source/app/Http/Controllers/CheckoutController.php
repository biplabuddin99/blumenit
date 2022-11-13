<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Customer\NewCustomerRequest;
use App\Http\Requests\Checkout\FinalCheckoutRequest;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\PhoneExt;
use App\Models\GeneralSetting;
use App\Models\shipping;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;

class CheckoutController extends Controller{
    
    use ResponseTrait;
    public function index(){
        /* call cart details */
        $cal_cart=$this->cal_cart();
        if(session()->get('contact_ext'))
            return redirect(route('front.detailscheckout'))->with($this->responseMessage(true, null, session()->get('email')));

        $cart = session()->get('cart', []);

        if(count((array) session('cart')) <= 0)
            return redirect(route('front.cart'))->with($this->responseMessage(true, null, "You have no product in cart."));
        
        $pids=array_keys((array) session('cart'));
        $products=Product::whereIn('id',$pids)->get();
        $gs=GeneralSetting::first();
        $context=PhoneExt::get();
        return view('frontend.checkout',compact('context','products','cart','gs','cal_cart'));
    }

    public function guest_checkout(NewCustomerRequest $request){
        try{
            $check_cust=Customer::where('email',$request->email)
                                    ->where('contact_ext',$request->contact_ext)
                                    ->where('contact',$request->contact);
            $count=$check_cust->count();
            if( $count > 0){
                $check_cust=$check_cust->first();
                if($check_cust->status == 0)
                    return redirect()->back()->with($this->responseMessage(false, "error", "You cannot use this email and contact number at this moment. Please contact to customer support for more details."));
                else
                    return redirect(route('front.detailscheckout'))->with($this->responseMessage(true, null, $request->email));
            }
            $cust = new Customer;
            $cust->email = $request->email;
            $cust->contact_ext = $request->contact_ext;
            $cust->contact = $request->contact;
            $cust->status = 1;
            if($cust->save()){
                $this->setSession($cust);
                return redirect(route('front.detailscheckout'))->with($this->responseMessage(true, null, $request->email));
            }
         }catch(Exception $e){
            //dd($e);
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    protected function setSession($user){
        return request()->session()->put([
            'user' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'contact_ext' => $user->contact_ext,
            'contact' => $user->contact,
            'type'=>'Signed in as guest with email address:'
        ]);
    }

    public function cal_cart( $shipid=false){
        $total=0;
        $t_discount=0;
        $t_vat=0;
        $cart = session()->get('cart', []);
        
        foreach($cart as $c){
            $total+=$c['price'] * $c['quantity'];
            $t_discount+=$c['quantity'] * $c['discount_amount'];
            $t_vat+=$c['quantity'] * $c['vat_amount'];
        }
        /* shipping */
        $shipping_name="";
        $shipping_cost=0;
        $shippingID=0;
        $cal_cartold=session()->get('cal_cart', []);
        if($shipid){
            $shipping=shipping::find($shipid);
            if($shipping){
                $shippingID=$shipping->id;
                $shipping_name=$shipping->name;
                $shipping_cost=$shipping->amount;
            }
        }elseif(count($cal_cartold) > 0){
            $shippingID=$cal_cartold['shippingID'];
            $shipping_cost=$cal_cartold['shipping'];
            $shipping_name=$cal_cartold['shippingname'];
        }
        
        $shippingfree=shipping::where('status',1)->where('show_in_option',0)->get();
        if($shippingfree){
            foreach($shippingfree as $s){
                if($s->condition_amount > 0){
                    if((($total - $t_discount)+$t_vat) >= $s->condition_amount){
                        $shippingID=$s->id;
                        $shipping_name=$s->name;
                        $shipping_cost=$s->amount;
                    }
                }
            }
        }
        
        
        $cal_cart=array(
            "total_mrp"=>number_format($total,2),
            "discount"=>number_format($t_discount,2),
            "vat"=>number_format($t_vat,2),
            "sub_total"=>number_format((($total - $t_discount)+$t_vat),2),
            "shipping"=>number_format($shipping_cost,2),
            "shippingID"=>$shippingID,
            "shippingname"=>$shipping_name,
            "total"=>number_format((($total - $t_discount) + $t_vat + $shipping_cost),2)
        );
        session()->put('cal_cart', $cal_cart);
        return $cal_cart;
    }
    
    public function shippingcheck(Request $r){
        $shipping=shipping::find($r->id);
        $terms="";
        if($shipping){
            $terms=$shipping->terms;
        }
        $cal_cart=$this->cal_cart($r->id);
        return json_encode(array('total'=>$cal_cart['total'],'cost'=>$cal_cart['shipping'],'terms'=>$terms));
    }

    public function details_checkout(Request $r){
        $cal_cart=$this->cal_cart();
        if(!session()->get('contact_ext'))
            return redirect(route('front.checkout'))->with($this->responseMessage(true, null, "you have to login or order as a guest."));
        
        $cart = session()->get('cart', []);

        if(count((array) session('cart')) <= 0)
            return redirect(route('front.cart'))->with($this->responseMessage(true, null, "You have no product in cart."));

        $country=Country::get();
        $state=State::get();
        $city=City::get();
        $user_address = session()->get('user_address', []);
        if($r->type)
            $type=$r->type;
        else
            $type=false;
        
        $context=PhoneExt::get();
        $gs=GeneralSetting::first();
        $shipping=shipping::where('status',1)->where('show_in_option',1)->get();
        return view('frontend.detailscheckout',compact('shipping','context','user_address','type','city','state','country','cart','gs','cal_cart'));
    }

    public function checkout_address(FinalCheckoutRequest $request){
        try{
            if(!session()->get('contact_ext'))
                return redirect(route('front.checkout'))->with($this->responseMessage(true, null, "you have to login or order as a guest."));

            if(count((array) session('cart')) <= 0)
                return redirect(route('front.cart'))->with($this->responseMessage(true, null, "You have no product in cart."));
        
            session()->put('user_address',[
                'full_name' => $request->full_name,
                'email' => $request->email,
                'contact' => $request->contact,
                'contact_ext' => $request->contact_ext,
                'address' => $request->address,
                'zip' => $request->zip,
                'country_id' => $request->country_id?explode("~",$request->country_id)[0]:"",
                'country' => $request->country_id?explode("~",$request->country_id)[1]:"",
                'state_id' => $request->state_id?explode("~",$request->state_id)[0]:"",
                'state' => $request->state_id?explode("~",$request->state_id)[1]:"",
                'city_id' => $request->city_id?explode("~",$request->city_id)[0]:"",
                'city' => $request->city_id?explode("~",$request->city_id)[1]:"",
                'pickup' => $request->pickup?1:0
            ]);
            return redirect(route('front.finalcheckout'))->with($this->responseMessage(true, null, $request->email));
        }catch(Exception $e){
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    public function final_checkout(){
        if(!session()->get('contact_ext'))
            return redirect(route('front.checkout'))->with($this->responseMessage(true, null, "you have to login or order as a guest."));
        
        if(count((array) session('cart')) <= 0)
            return redirect(route('front.cart'))->with($this->responseMessage(true, null, "You have no product in cart."));
    
        $cal_cart=$this->cal_cart();
        $cart = session()->get('cart', []);
        $user_address = session()->get('user_address', []);
        $pids=array_keys((array) session('cart'));
        $products=Product::whereIn('id',$pids)->get();
        $gs=GeneralSetting::first();
        return view('frontend.finalcheckout',compact('products','cart','gs','cal_cart','user_address'));
    }

    public function order_submit(Request $r){
        try{
            $user_address = session()->get('user_address', []);
            $cart = session()->get('cart', []);
            $cal_cart=session()->get('cal_cart', []);
            if(!session()->get('contact_ext'))
                return redirect(route('front.checkout'))->with($this->responseMessage(true, null, "you have to login or order as a guest."));
            if(count($cart) <= 0 )
                return redirect(route('front.checkout'))->with($this->responseMessage(true, null, "you have to add product to cart first."));
            
            $order=new Order;
            $order->customer_id=session()->get('user');
            $order->cart=base64_encode(json_encode(array("cart"=>$cart,"cal_cart"=>$cal_cart)));
            $order->total_mrp=str_replace( ',', '', $cal_cart["total_mrp"]);
            $order->discount=str_replace( ',', '', $cal_cart["discount"]);
            $order->vat=str_replace( ',', '', $cal_cart["vat"]);
            $order->subtotal=str_replace( ',', '', $cal_cart["sub_total"] );
            $order->delivery_charge=str_replace( ',', '', $cal_cart["shipping"]);
            $order->shipping_id=$cal_cart["shippingID"];
            $order->shipping_name=$cal_cart["shippingname"];
            $order->total=str_replace( ',', '', $cal_cart["total"]);
            $order->pay_method=$r->pay_method;
            $order->comment=$r->comment;
            $order->full_name=$user_address["full_name"];
            $order->email=$user_address["email"]?$user_address["email"]:session()->get('email');
            $order->contact=$user_address["contact"]?$user_address["contact"]:session()->get('contact');
            $order->contact_ext=$user_address["contact_ext"]?$user_address["contact_ext"]:session()->get('contact_ext');
            $order->address=$user_address["address"];
            $order->zip=$user_address["zip"];
            $order->country_id=$user_address["country_id"]?$user_address["country_id"]:0;
            $order->state_id=$user_address["state_id"]?$user_address["state_id"]:0;
            $order->city_id=$user_address["city_id"]?$user_address["city_id"]:0;
            $order->status=0;
            $order->payment_status=0;
            if($order->save()){
                Session::forget('cart');
                Session::forget('user_address');
                Session::forget('cal_cart');
                return redirect(route('front.finishorder',$order->id))->with($this->responseMessage(true, null, "data saved!"));
            }
                
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    public function finish_order($order){
        if(!session()->get('contact_ext'))
            return redirect(route('front.checkout'))->with($this->responseMessage(true, null, "you have to login or order as a guest."));
        $order=Order::find($order);
        $cart=json_decode(base64_decode($order->cart),true);
        $gs=GeneralSetting::first();
        return view('frontend.finishorder',compact('order','cart','gs'));
    }
}
