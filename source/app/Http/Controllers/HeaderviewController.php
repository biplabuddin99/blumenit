<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\HeaderviewRequest\UpdateRequest;
use App\Http\Requests\HeaderviewRequest\CreateRequest;
use App\Models\Headerview;
use Exception;
use Session;

class HeaderviewController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Headerview::orderBy('id','DESC')->paginate(5);
        return view('backend.headerview.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.headerview.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try{
            $image = $request->file('image');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            $favicon = $request->file('favicon');
            $faviconName = '/source/public/images/'.time().'.'.$favicon->extension();
            $header = new Headerview;
            $header->logo_link=$request->link;
            $header->logo_image=$imageName;
            $header->favicon=$faviconName;
            $header->whatsapp=$request->whatsapp;
            $header->contact=$request->contact;
            $header->email=$request->email;
            $header->created_by = Session::get('user');
            $header->updated_by = Session::get('user');
            if($header->save()){
                $image->move(public_path('images'),$imageName);
                $favicon->move(public_path('images'),$faviconName);
                return redirect(route(Session::get('identity').'.headerview.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }

        }catch(Exception $erer){
            dd($erer);
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
    public function edit(Headerview $headerview)
    {
        return view('backend.headerview.edit',compact('headerview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Headerview $headerview)
    {
        try{
            $image = $request->file('image');
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path($headerview->logo_image))){
                     unlink(public_path($headerview->logo_image));
               }
               $headerview->logo_image=$imageName;
           }
           $favicon = $request->file('favicon');
            if($favicon){
                $faviconName = '/source/public/images/'.time().'.'.$favicon->extension();
                if($headerview->favicon && file_exists(public_path($headerview->favicon))){
                     unlink(public_path($headerview->favicon));
               }
               $headerview->favicon=$faviconName;
           }
            $headerview->logo_link=$request->link;
            $headerview->whatsapp=$request->whatsapp;
            $headerview->contact=$request->contact;
            $headerview->email=$request->email;
            
            $menusetting=array("about"=>"d-none","category"=>"d-none","games"=>"d-none","corporate"=>"d-none","shopview"=>"d-none","contact"=>"d-none");
            foreach($request->menu_setting as $k=>$v){
                $menusetting[$v]="show";
            }
            $headerview->menu_setting=json_encode($menusetting);
           
            
            
            $headerview->updated_by = Session::get('user');
            if($headerview->save()){
                if($image){
                    $image->move(public_path('images'),$imageName);
                }
                if($favicon){
                    $favicon->move(public_path('images'),$faviconName);
                }
                return redirect(route(Session::get('identity').'.headerview.index'))->with($this->responseMessage(true, null, "You have successfully update data."));
            }
        }catch(Exception $erer){
            //dd($erer);
            return redirect(route(Session::get('identity').'.headerview.index'))->with($this->responseMessage(false,"error", "Please Try again"));
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
