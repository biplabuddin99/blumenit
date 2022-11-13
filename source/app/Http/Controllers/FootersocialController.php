<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use App\Models\Sociallink;
use Exception;
use Session;

class FootersocialController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturer = Sociallink::orderBy('id','DESC')->paginate(5);
        return view('backend.footersocial.index',compact('manufacturer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footersocial.create');
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
           
            $manufacturer = new Sociallink;
            $manufacturer->facebook = $request->facebook;
            $manufacturer->twitter = $request->twitter;
            $manufacturer->whatsapp = $request->whatsapp;
            $manufacturer->linkedin = $request->linkedin;
            $manufacturer->created_by = Session::get('user');
            $manufacturer->updated_by = Session::get('user');
            if($manufacturer->save()){
                return redirect(route(Session::get('identity').'.homefootsocial.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }
         }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.homefootsocial.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = Sociallink::findOrFail(1);
        return view('backend.footersocial.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $manufacturer = Sociallink::findOrFail(1);
            $manufacturer->facebook = $request->facebook;
            $manufacturer->twitter = $request->twitter;
            $manufacturer->whatsapp = $request->whatsapp;
            $manufacturer->linkedin = $request->linkedin;
            $manufacturer->updated_by = Session::get('user');
            if($manufacturer->save()){
                
                
                return redirect(route(Session::get('identity').'.homefootsocial.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }
         }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.homefootsocial.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
