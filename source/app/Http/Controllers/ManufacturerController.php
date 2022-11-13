<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\Manufacturer\CreateRequest;
use App\Http\Requests\Manufacturer\UpdateRequest;

use App\Models\Manufacturer;
use Exception;
use Session;

class ManufacturerController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturer = Manufacturer::orderBy('id','DESC')->paginate(10);
        return view('backend.manufacturer.index',compact('manufacturer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.manufacturer.create');
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
            $manufacturer = new Manufacturer;
            $manufacturer->name=$request->name;
            $manufacturer->email=$request->email;
            $manufacturer->contact=$request->contact;
            $manufacturer->address=$request->address;
            $manufacturer->image=$imageName;
            $manufacturer->created_by = Session::get('user');
            $manufacturer->updated_by = Session::get('user');
            if($manufacturer->save()){
                $image->move(public_path('images'),$imageName);
                return redirect(route(Session::get('identity').'.manufacturer.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }
         }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.manufacturer.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
    public function edit(Manufacturer $manufacturer)
    {
        return view('backend.manufacturer.edit',compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Manufacturer $manufacturer)
    {
        try{
            $manufacturer->name=$request->name;
            $manufacturer->contact=$request->contact;
            $manufacturer->address=$request->address;
            $manufacturer->email=$request->email;
            $image=$request->file('image');
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$manufacturer->image"))){
                     unlink(public_path("$manufacturer->image"));
               }
               $manufacturer->image=$imageName;
           }
           if($manufacturer->save()){
            if($image){
                $image->move(public_path('images'),$imageName);
            }
            return redirect(route(Session::get('identity').'.manufacturer.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
           }

        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.manufacturer.edit'))->with($this->responseMessage(false, "error", "Please Try again"));
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
