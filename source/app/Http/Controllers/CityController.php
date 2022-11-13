<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Session;
use Exception;

class CityController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        if($request){
            $search=$request->name;
            $data=City::where('city','LIKE', '%'.$search.'%')->orderBy('id','DESC')->paginate(10);
        }else{
            $search="";
            $data=City::orderBy('id','DESC')->paginate(10);
        }
        return view('backend.city.index',compact('data','search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=Country::orderBy('country')->get();
        $state=State::orderBy('state')->get();
        return view('backend.city.create',compact('country','state'));
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
            $city = new City;
            $city->state_id=$request->state_id;
            $city->country_id=$request->country_id;
            $city->city=$request->city;
           if($city->save()){
               return redirect(route(Session::get('identity').'.city.index'))->with($this->responseMessage(true, null, "You have successfully added data."));
           }
        }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country=Country::orderBy('country')->get();
        $state=State::orderBy('state')->get();
        $data=City::find($id);
        return view('backend.city.edit',compact('country','state','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $city = City::find($id);
            $city->state_id=$request->state_id;
            $city->country_id=$request->country_id;
            $city->city=$request->city;
            if($city->save()){
                return redirect(route(Session::get('identity').'.city.index'))->with($this->responseMessage(true, null, "You have successfully updated data."));
            }
        }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
