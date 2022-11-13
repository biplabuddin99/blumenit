<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use Session;
use App\Http\Traits\ResponseTrait;
use App\Models\Slide;

class SlideController extends Controller
{
   use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::orderBy('id','DESC')->paginate(5);
        return view('backend.slide.index',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slide.create');
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
            $slide = new Slide;
            $slide->type=$request->type;
            $slide->name=$request->name;
            $slide->details=$request->details;
            $slide->title=$request->title;
            $slide->link=$request->link;
            $slide->image=$imageName;
            $slide->order=$request->rank;
            $slide->status=1;
            $slide->created_by = Session::get('user');
            $slide->updated_by = Session::get('user');
            if($slide->save()){
                $image->move(public_path('images'),$imageName);
               
                return redirect(route(Session::get('identity').'.slide.index'))->with($this->responseMessage(true, null, "You have successfully added a slider."));
            }
         }catch(Exception $e){
            //dd($e);
            return redirect(route(Session::get('identity').'.slide.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
    public function edit(Slide $slide)
    {
        return view('backend.slide.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        try{
            $image=$request->file('image');
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$slide->image"))){
                     unlink(public_path("$slide->image"));
               }
               $slide->image=$imageName;
           }
            $slide->type=$request->type;
            $slide->name=$request->name;
            $slide->details=$request->details;
            $slide->title=$request->title;
            $slide->link=$request->link;
            $slide->order=$request->rank;
            $slide->status=1;
            $slide->updated_by = Session::get('user');
            if($slide->save()){
                if($image){
                    $image->move(public_path('images'),$imageName);
                }
                return redirect(route(Session::get('identity').'.slide.index'))->with($this->responseMessage(true, null, "You have successfully updated a slider."));
            }
         }catch(Exception $e){
            //dd($e);
            return redirect(route(Session::get('identity').'.slide.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
        try{
            $slide=Slide::find($id);
            if($slide->delete()){
                return redirect(route(Session::get('identity').'.slide.index'))->with($this->responseMessage(true, null, "You have successfully deleted a slider."));
            }
         }catch(Exception $e){
            //dd($e);
            return redirect(route(Session::get('identity').'.slide.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }
}
