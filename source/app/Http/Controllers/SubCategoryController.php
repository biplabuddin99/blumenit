<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\Subcategory\CreateRequest;
use App\Http\Requests\Subcategory\UpdateRequest;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcategoryimage;
use Exception;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;

class SubCategoryController extends Controller
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
            $subcategory=Subcategory::where('name','LIKE', '%'.$search.'%')->orderBy('id','DESC')->paginate(10);
        }else{
            $search="";
            $subcategory=Subcategory::orderBy('id','DESC')->paginate(10);
        }
        
        return view('backend.subcategory.index',compact('subcategory','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('backend.subcategory.create',compact('category'));
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
            // DB::beginTransaction();
           
             $subcategory = new Subcategory;
             $subcategory->name=$request->name;
             $subcategory->category_id=$request->category_id;
             
             
             if($request->file('cat_icon')){
                $image = $request->file('cat_icon');
                $cat_icon_image = '/source/public/images/category/'.time().'.'.Str::random(8).time().'.'.$image->extension();
                $image->move(public_path('images/category'),$cat_icon_image);
                $subcategory->cat_icon=$cat_icon_image;
             }
             
             $subcategory->created_by = Session::get('user');
             $subcategory->updated_by = Session::get('user');
             if($subcategory->save()){
                foreach($request->image as $key=>$value){
                    $image = $request->file('image')[$key];
                    $subcategoryimage=new Subcategoryimage;
                    
                    $imageName = Str::random(8).time().'.'.$image->extension();
                    $destinationPath = public_path('/images/subcategory');
                    $img = Image::make($image->path());
                    $img->resize(1920, 420)->save($destinationPath.'/'.$imageName);
                    
                    $subcategoryimage->subcategory_id=$subcategory->id;
                    $subcategoryimage->image='/source/public/images/subcategory/'.$imageName;
                    $subcategoryimage->save();
                }
                return redirect(route(Session::get('identity').'.subcategory.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
             }
        }catch(Exception $e){
            dd($e);
            // DB::rollBack();
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $category=Category::all();
        $categoryimage = Subcategoryimage::where('subcategory_id', $subcategory->id)->get();
       return view('backend.subcategory.edit',compact('categoryimage','subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            // DB::beginTransaction();
            $subcategory= Subcategory::findOrFail($id);
            $subcategory->name=$request->name;
            $subcategory->category_id=$request->category_id;
            
            if($request->file('cat_icon')){
                $image = $request->file('cat_icon');
                $cat_icon_image = '/source/public/images/category/'.time().'.'.Str::random(8).time().'.'.$image->extension();
                $image->move(public_path('images/category'),$cat_icon_image);
                $subcategory->cat_icon=$cat_icon_image;
             }
            
            $subcategory->updated_by = Session::get('user');
             
           /* image for slider*/ 
            if($request->old_image){
                $oldimage=explode('/',$request->old_image);
                foreach($oldimage as $imgname){
                    $imgname='/source/public/images/subcategory/'.$imgname;
                    $oldimagedlt=Subcategoryimage::where('image',$imgname)->delete();
                    if(file_exists(public_path($imgname))){
                        unlink(public_path($imgname));
                    }
                }
            }
            if($request->image){
                foreach($request->image as $key=>$value){
                    $subcategoryimage=new Subcategoryimage;

                    $image = $request->file('image')[$key];
                    $imageName = Str::random(8).time().'.'.$image->extension();
       
     
                    $destinationPath = public_path('/images/subcategory');
                    $img = Image::make($image->path());
                    $img->resize(1920, 420)->save($destinationPath.'/'.$imageName);
                    //$img->resize(1920, 420, function ($constraint) {$constraint->aspectRatio();})->save($destinationPath.'/'.$imageName);
            
                    /*$destinationPath = public_path('/images');
                    $image->move($destinationPath, $imageName);*/
                    
                     $subcategoryimage->subcategory_id=$subcategory->id;
                     $subcategoryimage->image='/source/public/images/subcategory/'.$imageName;
                    
                     $subcategoryimage->save();
                }
            }
            /* image for slider*/

             if($subcategory->save()){
                return redirect(route(Session::get('identity').'.subcategory.index'))->with($this->responseMessage(true, null, "You have successfully updated a sub-category."));
            }
        }catch(Exception $e){
            dd($e);
            // DB::rollBack();
            return redirect(route(Session::get('identity').'.subcategory.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
