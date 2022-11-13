<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use App\Models\Footercol1;
use Exception;
use Session;

class Footercol1Controller extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturer = Footercol1::orderBy('id','DESC')->paginate(5);
        return view('backend.footercol1.index',compact('manufacturer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footercol1.create');
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
            $image = $request->file('image');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            $manufacturer = new Footercol1;
            $manufacturer->logo = $imageName;
            $manufacturer->title = $request->title;
            $manufacturer->text = $request->details;
            $manufacturer->copyright_notice = $request->c_notice;
            $manufacturer->created_by = Session::get('user');
            $manufacturer->updated_by = Session::get('user');
            if($manufacturer->save()){
                $image->move(public_path('images'),$imageName);
                return redirect(route(Session::get('identity').'.homefootcol1.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }
         }catch(Exception $e){
            //dd($e);
            return redirect(route(Session::get('identity').'.homefootcol1.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
        $data = Footercol1::findOrFail(1);
        return view('backend.footercol1.edit',compact('data'));
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
            $manufacturer = Footercol1::findOrFail(1);
            $image = $request->file('image');
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$manufacturer->logo"))){
                     unlink(public_path("$manufacturer->logo"));
               }
               $manufacturer->logo = $imageName;
           }
            
           
            $manufacturer->title = $request->title;
            $manufacturer->text = $request->details;
            $manufacturer->copyright_notice = $request->c_notice;
            $manufacturer->updated_by = Session::get('user');
            if($manufacturer->save()){
                if($image){
                    $image->move(public_path('images'),$imageName);
                }
                
                return redirect(route(Session::get('identity').'.homefootcol1.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }
         }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.homefootcol1.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
