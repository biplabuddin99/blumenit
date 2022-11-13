<?php

namespace App\Http\Controllers;

use App\Models\shipping;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Session;
use Exception;

class ShippingController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=shipping::orderBy('id','DESC')->paginate(20);
        return view('backend.shipping.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $shipping                   = new shipping;
            $shipping->name             =$request->name;
            $shipping->amount           =$request->amount;
            $shipping->condition_amount =$request->condition_amount;
            $shipping->terms            =$request->terms;
            $shipping->show_in_option   =$request->show_in_option;
            $shipping->status           =1;
           if($shipping->save()){
               return redirect(route(Session::get('identity').'.shipping.index'))->with($this->responseMessage(true, null, "You have successfully added data."));
           }
        }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(shipping $shipping)
    {
        $data=$shipping;
        return view('backend.shipping.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shipping $shipping)
    {
        try{
            $shipping->name             =$request->name;
            $shipping->amount           =$request->amount;
            $shipping->condition_amount =$request->condition_amount;
            $shipping->terms            =$request->terms;
            $shipping->show_in_option   =$request->show_in_option;
            $shipping->status           =$request->status;
           if($shipping->save()){
               return redirect(route(Session::get('identity').'.shipping.index'))->with($this->responseMessage(true, null, "You have successfully updated data."));
           }
        }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(shipping $shipping)
    {
        //
    }
}
