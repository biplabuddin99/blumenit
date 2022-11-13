<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Session;
use Exception;

class StateController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=State::orderBy('state')->paginate(20);
        return view('backend.state.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=Country::orderBy('country')->get();
        return view('backend.state.create',compact('country'));
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
            $state = new State;
            $state->state=$request->state;
            $state->country_id=$request->country_id;
           if($state->save()){
               return redirect(route(Session::get('identity').'.state.index'))->with($this->responseMessage(true, null, "You have successfully added data."));
           }
       }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=State::find($id);
        $country=Country::orderBy('country')->get();
        return view('backend.state.edit',compact('country','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $state = State::find($id);
            $state->state=$request->state;
            $state->country_id=$request->country_id;
           if($state->save()){
               return redirect(route(Session::get('identity').'.state.index'))->with($this->responseMessage(true, null, "You have successfully updated data."));
           }
       }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }
}
