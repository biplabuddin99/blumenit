<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;

use App\Models\Category;
use App\Models\Categoryimage;
use Exception;
use Session;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
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
            $category=Category::where('name','LIKE', '%'.$search.'%')->orderBy('id','DESC')->paginate(10);
        }else{
            $search="";
            $category=Category::orderBy('id','DESC')->paginate(10);
        }
        
        return view('backend.category.index',compact('category','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            // DB::beginTransaction();
            
             $category = new Category;
             $category->name=$request->name;
             $category->is_game=$request->is_game;
             $category->feature_cat=$request->feature_cat;
             $category->show_catpage=$request->show_catpage;
             $category->cat_page_order=$request->cat_page_order;
             $category->created_by = Session::get('user');
             $category->updated_by = Session::get('user');
            
             /*if($request->file('cat_icon')){
                $image = $request->file('cat_icon');
                $cat_icon = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                $img = Image::make($image->path());
                $img->resize(21, 25)->save($destinationPath.'/'.$cat_icon);
                $category->cat_icon='/source/public/images/category/'.$cat_icon;
             }*/
             if($request->file('cat_icon')){
                $image = $request->file('cat_icon');
                $cat_icon_image = '/source/public/images/category/'.time().'.'.Str::random(8).time().'.'.$image->extension();
                $image->move(public_path('images/category'),$cat_icon_image);
                $category->cat_icon=$cat_icon_image;
             }
             if($request->file('feature_image')){
                $image = $request->file('feature_image');
                $feature_image = '/source/public/images/category/'.time().'.'.$image->extension();
                $image->move(public_path('images/category'),$feature_image);
                $category->feature_image=$feature_image;
             }
             
             if($request->file('cat_image')){
                $image = $request->file('cat_image');
                $cat_image = '/source/public/images/category/'.time().'.'.$image->extension();
                $image->move(public_path('images/category'),$cat_image);
                $category->cat_image=$cat_image;
             }
             
             if($request->file('lsb_image')){
                $image = $request->file('lsb_image');
                $lsb_image = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                if($image->extension() != 'svg'){
                    $img = Image::make($image->path());
                    $img->resize(270, 440)->save($destinationPath.'/'.$lsb_image);
                }else{
                    $image->move(public_path('images/category'),$lsb_image);
                }
                $category->lsb_image='/source/public/images/category/'.$lsb_image;
             }

             

             if($category->save()){
                foreach($request->image as $key=>$value){

                    $categoryimage=new Categoryimage;

                    $image = $request->file('image')[$key];
                    $imageName = Str::random(8).time().'.'.$image->extension();
       
     
                    $destinationPath = public_path('/images/category');
                    $img = Image::make($image->path());
                    $img->resize(1920, 420)->save($destinationPath.'/'.$imageName);
                    //$img->resize(1920, 420, function ($constraint) {$constraint->aspectRatio();})->save($destinationPath.'/'.$imageName);
            
                    /*$destinationPath = public_path('/images/category');
                    $image->move($destinationPath, $imageName);*/
                    
                     $categoryimage->category_id=$category->id;
                     $categoryimage->image='/source/public/images/category/'.$imageName;
                    
                     $categoryimage->save();
                }
                return redirect(route(Session::get('identity').'.categoryy.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
             }
        }catch(Exception $e){
            //dd($e);
            // DB::rollBack();
            return redirect(route(Session::get('identity').'.categoryy.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::findOrFail($id);
        $categoryimage = Categoryimage::where('category_id', $category->id)->get();
       return view('backend.category.edit',compact('categoryimage','category'));
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
            $category= Category::findOrFail($id);
            $category->name=$request->name;
            $category->is_game=$request->is_game;
            $category->feature_cat=$request->feature_cat;
            $category->show_catpage=$request->show_catpage;
            $category->cat_page_order=$request->cat_page_order;
            
            if($request->file('cat_icon')){
                $image = $request->file('cat_icon');
                $cat_icon_image = '/source/public/images/category/'.time().'.'.Str::random(8).time().'.'.$image->extension();
                $image->move(public_path('images/category'),$cat_icon_image);
                $category->cat_icon=$cat_icon_image;
             }
            if($request->file('feature_image')){
                $image = $request->file('feature_image');
                $feature_image = '/source/public/images/category/'.time().'.'.$image->extension();
                $image->move(public_path('images/category'),$feature_image);
                $category->feature_image=$feature_image;
            }
             
            if($request->file('cat_image')){
                $image = $request->file('cat_image');
                $cat_image = '/source/public/images/category/'.time().'.'.$image->extension();
                $image->move(public_path('images/category'),$cat_image);
                $category->cat_image=$cat_image;
            }

            if($request->file('lsb_image')){
                $image = $request->file('lsb_image');
                $lsb_image = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                if($image->extension() != 'svg'){
                    $img = Image::make($image->path());
                    $img->resize(270, 440)->save($destinationPath.'/'.$lsb_image);
                }else{
                    $image->move(public_path('images/category'),$lsb_image);
                }
                $category->lsb_image='/source/public/images/category/'.$lsb_image;
             }

            $category->updated_by = Session::get('user');
             
           /* image for slider*/ 
            if($request->old_image){
                $oldimage=explode('/',$request->old_image);
                foreach($oldimage as $imgname){
                    $imgname='/source/public/images/category/'.$imgname;
                    $oldimagedlt=Categoryimage::where('image',$imgname)->delete();
                    if(file_exists(public_path($imgname))){
                        unlink(public_path($imgname));
                    }
                }
            }
            if($request->image){
                foreach($request->image as $key=>$value){
                    $categoryimage=new Categoryimage;

                    $image = $request->file('image')[$key];
                    $imageName = Str::random(8).time().'.'.$image->extension();
     
                    $destinationPath = public_path('/images/category');
                    $img = Image::make($image->path());
                    $img->resize(1920, 420)->save($destinationPath.'/'.$imageName);
                    //$img->resize(1920, 420, function ($constraint) {$constraint->aspectRatio();})->save($destinationPath.'/'.$imageName);
            
                    /*$destinationPath = public_path('/images/category');
                    $image->move($destinationPath, $imageName);*/
                    
                     $categoryimage->category_id=$category->id;
                     $categoryimage->image='/source/public/images/category/'.$imageName;
                    
                     $categoryimage->save();
                }
            }
            /* image for slider*/

             if($category->save()){
                return redirect(route(Session::get('identity').'.categoryy.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }
        }catch(Exception $e){
            dd($e);
            // DB::rollBack();
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
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
