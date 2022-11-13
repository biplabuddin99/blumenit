<?php

namespace App\Http\Controllers;

use App\Models\PhoneExt;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Session;
use Exception;

class PhoneExtController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PhoneExt::orderBy('id','DESC')->paginate(20);
        return view('backend.phoneext.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.phoneext.create');
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
            $phoneext = new PhoneExt;
            $phoneext->ext=$request->ext;
           if($phoneext->save()){
               return redirect(route(Session::get('identity').'.phoneext.index'))->with($this->responseMessage(true, null, "You have successfully added data."));
           }
       }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhoneExt  $phoneExt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=PhoneExt::find($id);
        return view('backend.phoneext.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhoneExt  $phoneExt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $phoneext = PhoneExt::find($id);
            $phoneext->ext=$request->ext;
           if($phoneext->save()){
               return redirect(route(Session::get('identity').'.phoneext.index'))->with($this->responseMessage(true, null, "You have successfully updated data."));
           }
       }catch(Exception $e){
           return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhoneExt  $phoneExt
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneExt $phoneExt)
    {
        //
    }
}
