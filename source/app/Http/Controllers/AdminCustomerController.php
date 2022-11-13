<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use  App\Http\Requests\Customer\UpdateCustomerRequest;
use  App\Http\Requests\Customer\NewCustomerRequest;

use App\Models\Customer;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\PhoneExt;
use Session;

class AdminCustomerController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request && $request->name){
            $search=$request->name;
            $customer=Customer::where('first_name','LIKE', '%'.$search.'%')->orWhere('last_name','LIKE', '%'.$search.'%')->orWhere('last_name', '')->orWhere('first_name', '')->latest()->paginate(10);
        }else{
            $search="";
            $customer=Customer::latest()->paginate(10);
        }
        
        return view('backend.customer.index',compact('customer','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=Country::get();
        $state=State::get();
        $city=City::get();
        $context=PhoneExt::get();
        return view('backend.customer.create',compact('country','state','city','context'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewCustomerRequest $request)
    {
        try{
            $check_cust=Customer::where('email',$request->email)
                                    ->where('contact_ext',$request->contact_ext)
                                    ->where('contact',$request->contact);
            $count=$check_cust->count();
            if( $count > 0){
                return redirect()->back()->with($this->responseMessage(false, "error", "You cannot use this email and contact number. Its already used."));
            }
            $cust = new Customer;
            $cust->first_name = $request->first_name;
            $cust->last_name = $request->last_name;
            $cust->email = $request->email;
            $cust->contact_ext = $request->contact_ext;
            $cust->contact = $request->contact;
            $cust->address = $request->address;
            $cust->zip = $request->zip;
            $cust->country_id = $request->country_id;
            $cust->state_id = $request->state_id;
            $cust->city_id = $request->city_id;
            $cust->status = 1;
            if($cust->save()){
                return redirect(route(Session::get('identity').'.admincustomer.index'))->with($this->responseMessage(true, null, "Data Saved."));
            }
         }catch(Exception $e){
            //dd($e);
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country=Country::get();
        $state=State::get();
        $city=City::get();
        $context=PhoneExt::get();
        $data=Customer::find($id);
        return view('backend.customer.edit',compact('country','state','city','context','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        try{
            $cust = Customer::find($id);
            $cust->first_name = $request->first_name;
            $cust->last_name = $request->last_name;
            $cust->email = $request->email;
            $cust->contact_ext = $request->contact_ext;
            $cust->contact = $request->contact;
            $cust->address = $request->address;
            $cust->zip = $request->zip;
            $cust->country_id = $request->country_id;
            $cust->state_id = $request->state_id;
            $cust->city_id = $request->city_id;
            $cust->status = $request->status;
            if($cust->save()){
                return redirect(route(Session::get('identity').'.admincustomer.index'))->with($this->responseMessage(true, null, "Your profile has been updated."));
            }
         }catch(Exception $e){
            dd($e);
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
