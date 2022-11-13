<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use App\Models\Homesection3image;
use App\Models\Homesection3view;
use Illuminate\Support\Str;
use Exception;
use Session;

class HomeSection3Controller extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Homesection3view::orderBy('id','DESC')->paginate(5);
        return view('backend.homesection3.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.homesection3.create');
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
            $hs = new Homesection3view;
            $hs->title = $request->title;
            $hs->heading1 = $request->head1;
            $hs->heading2 = $request->head2;
            $hs->details = $request->details1;
            
            if($request->file('fimage')){
                $image = $request->file('fimage');
                $feature_image = '/source/public/images/homes3/'.time().'.'.$image->extension();
                $image->move(public_path('images/homes3'),$feature_image);
                $hs->feature_image=$feature_image;
            }

            $hs->created_by = Session::get('user');
            $hs->updated_by = Session::get('user');
            if($hs->save()){
                $pro_id=$hs->id;
                if($request->image){
                    foreach($request->image as $key=>$value){
                        $hsimage=new Homesection3image;
    
                        $image = $request->file('image')[$key];
                        $imageName = Str::random(8).time().'.'.$image->extension();
           
                        //$destinationPath = public_path('/images/homes3');
                        //$img = Image::make($image->path());
                        //$img->resize(104, 34)->save($destinationPath.'/'.$imageName);
                        //$img->resize(1920, 420, function ($constraint) {$constraint->aspectRatio();})->save($destinationPath.'/'.$imageName);
                
                        $destinationPath = public_path('/images/homes3');
                        $image->move($destinationPath, $imageName);
                        
                         $hsimage->Homesection3view_id=$pro_id;
                         $hsimage->image='/source/public/images/homes3/'.$imageName;
                        
                         $hsimage->save();
                    }
                }
                return redirect(route(Session::get('identity').'.homesec3.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }
         }catch(Exception $e){
            //dd($e);
            return redirect(route(Session::get('identity').'.homesec3.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
        $data = Homesection3view::findOrFail(1);
        return view('backend.homesection3.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request,$id)
    {
        try{
            $hs = Homesection3view::find($id);

            if($request->file('fimage')){
                $image = $request->file('fimage');
                $feature_image = '/source/public/images/homes3/'.time().'.'.$image->extension();
                $image->move(public_path('images/homes3'),$feature_image);
                $hs->feature_image=$feature_image;
            }

            $hs->title = $request->title;
            $hs->heading1 = $request->head1;
            $hs->heading2 = $request->head2;
            $hs->details = $request->details1;
            $hs->updated_by = Session::get('user');

            /* image for slider*/ 
            if($request->old_image){
                $oldimage=explode('/',$request->old_image);
                foreach($oldimage as $imgname){
                    $imgname='/source/public/images/homes3/'.$imgname;
                    $oldimagedlt=Homesection3image::where('image',$imgname)->delete();
                    if(file_exists(public_path($imgname))){
                        unlink(public_path($imgname));
                    }
                }
            }
            if($request->image){
                foreach($request->image as $key=>$value){
                    $hsimage=new Homesection3image;

                    $image = $request->file('image')[$key];
                    $imageName = Str::random(8).time().'.'.$image->extension();
       
     
                    $destinationPath = public_path('/images/homes3');
                    //$img = Image::make($image->path());
                    //$img->resize(104, 34)->save($destinationPath.'/'.$imageName);
                    //$img->resize(1930, 430, function ($constraint) {$constraint->aspectRatio();})->save($destinationPath.'/'.$imageName);

                    $image->move($destinationPath, $imageName);
                    
                     $hsimage->Homesection3view_id=$id;
                     $hsimage->image='/source/public/images/homes3/'.$imageName;
                    
                     $hsimage->save();
                }
            }
            /* image for slider*/
            if($hs->save()){
                return redirect(route(Session::get('identity').'.homesec3.index'))->with($this->responseMessage(true, null, "You have successfully updated homesection3."));
            }
         }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.homesec3.index'))->with($this->responseMessage(false, "error", "Please try again!"));
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
