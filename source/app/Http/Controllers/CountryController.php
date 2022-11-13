<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Session;
use Exception;

class CountryController extends Controller
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
            $data=Country::where('country','LIKE', '%'.$search.'%')->orderBy('id','DESC')->paginate(10);
        }else{
            $search="";
            $data=Country::orderBy('id','DESC')->paginate(10);
        }
        
        return view('backend.country.index',compact('data','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.country.create');
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
             $country = new Country;
             $country->country=$request->country;
            if($country->save()){
                return redirect(route(Session::get('identity').'.country.index'))->with($this->responseMessage(true, null, "You have successfully added data."));
            }
        }catch(Exception $e){
            return redirect(route(Session::get('identity').'.country.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Country::find($id);
        return view('backend.country.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $country = Country::find($id);
            $country->country=$request->country;
           if($country->save()){
               return redirect(route(Session::get('identity').'.country.index'))->with($this->responseMessage(true, null, "You have successfully updated data."));
           }
       }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
