<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Exception;
use Session;

class OrderController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer="";
        $or_date="";
        $order=Order::where('customer_id','>',0);
        if($request){
            if($request->customer){
                echo "ok";
                $customer=$request->customer;
                $order=$order->where('full_name','LIKE', '%'.$customer.'%')->orWhere('contact','LIKE', '%'.$customer.'%')->orWhere('address','LIKE', '%'.$customer.'%');
            }
            if($request->or_date){
                $or_date=$request->or_date;
                $order=$order->whereDate('created_at',$or_date);
            }
        }
        
        $order = $order->latest()->paginate(10);
        
        return view('backend.order.index',compact('order','customer','or_date'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('backend.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('backend.order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            // DB::beginTransaction();
            $order= Order::findOrFail($id);
            $order->status=$request->status;
            $order->payment_status=$request->payment_status;
            $order->updated_by = Session::get('user');
             if($order->save()){
                return redirect(route(Session::get('identity').'.order.index'))->with($this->responseMessage(true, null, "You have successfully update order."));
            }
        }catch(Exception $e){
            //dd($e);
            // DB::rollBack();
            return redirect(route(Session::get('identity').'.order.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            // DB::beginTransaction();
            $order= Order::findOrFail($id);
             if($order->delete()){
                return redirect()->back()->with($this->responseMessage(true, null, "You have successfully delete order."));
            }
        }catch(Exception $e){
            //dd($e);
            // DB::rollBack();
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }
}
