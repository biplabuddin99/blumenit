<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\GeneralSetting;
use View;

class CartController extends Controller
{
    public function cartView(){
        $cart = session()->get('cart', []);
        $pids=array_keys((array) session('cart'));
        $gs=GeneralSetting::first();
        $products=Product::whereIn('id',$pids);
        /* get similar product */
        $similarpro=$products->pluck('category_id','category_id');
        $similarpro=Product::whereNotIn('id',$pids)->whereIn('category_id',$similarpro)->limit(12)->get();
        /* get cart product */
        $products= $products->get();
        return view('frontend.cart',compact('products','cart','similarpro','gs'));
    }
    public function addToCart(Request $r){
        $id=$r->id;
        $product = Product::findOrFail($id);
        $msg="<b>Congratulation!</b> Product added to cart.";
        $type="";
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            if($product->max_qty >= ($cart[$id]['quantity'] + $r->quantity)){
                $cart[$id]['quantity']+=$r->quantity;
            }else{
                $msg="<b>Sorry</b> You cannot buy more than ".$product->max_qty." in single order";
                $type="danger";
            }
        } else {
            if($r->quantity <= $product->max_qty){
                $price=$product->price;
                $discount_amount=0;

                if($product->discount){
                    $discount_amount=($product->price * ($product->discount/100));
                    $price=($product->price - ($product->price * ($product->discount/100)));
                }
                
                $vat_amount=0;

                if((float) $product->vat_status > 0){
                    $vat_amount=($price * ((float) $product->vat_status/100));
                } 

                $cart[$id] = [
                    "name" => $product->name,
                    "sku" => $product->sku,
                    "quantity" => $r->quantity,
                    "price" => $product->price,
                    "dis_price" => $price,
                    "discount" => $product->discount,
                    "discount_amount" => $discount_amount,
                    "vat" => $product->vat_status,
                    "vat_amount" => $vat_amount,
                    "image" => $product->feature_image
                ];
            }else{
                $msg="<b>Sorry</b> You cannot buy more than ".$product->max_qty." in single order";
                $type="danger";
            }
        }
          
        session()->put('cart', $cart);

        return response()->json(array("total_product" => count((array) session('cart')),"msg"=> $msg,'type'=>$type), 200);
        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updateCart(Request $request)
    {
        $type="error";
        if($request->id && $request->qty){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->qty;
            session()->put('cart', $cart);

            $cart = session()->get('cart', []);
            $pids=array_keys((array) session('cart'));
            $products=Product::whereIn('id',$pids)->get();
            $type="success";
            $msg="<b>Congratulation!</b> Cart updated successfully.";
            return View::make("frontend.cart_support",compact('cart','products','type','msg'))->render();
        }else{
            $msg="<b>Sorry</b>! Cart update fail. Please try again.";
            return View::make("frontend.cart_support",compact('cart','products','type','msg'))->render();
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeCart(Request $request)
    {
        $type="error";
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);

                $cart = session()->get('cart', []);
                $pids=array_keys((array) session('cart'));
                $products=Product::whereIn('id',$pids)->get();
                $type="success";
                $msg="<b>Congratulation!</b> Product deleted from cart.";
                return View::make("frontend.cart_support",compact('cart','products','type','msg'))->render();
            }else{
                $msg="<b>Sorry</b>! This product is not available in your cart.";
                return View::make("frontend.cart_support",compact('cart','products','type','msg'))->render();
            }
        }else{
                $msg="<b>Sorry</b>! Something is wrong? Please try again";
            return View::make("frontend.cart_support",compact('cart','products','type','msg'))->render();
        }

    }
}
