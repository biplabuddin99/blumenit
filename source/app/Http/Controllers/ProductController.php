<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Exception;
use Session;
use Illuminate\Support\Facades\Log;
use Image;
class ProductController extends Controller
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
            $product=Product::where('name','LIKE', '%'.$search.'%')->orderBy('id','DESC')->paginate(10);
        }else{
            $search="";
            $product=Product::orderBy('id','DESC')->paginate(10);
        }
        return view('backend.product.index',compact('product','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=array('manufacturer'=>Manufacturer::all(),'category'=>Category::all(),'subcategory'=>Subcategory::all());
        return view('backend.product.create',$data);
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
            $image = $request->file('feature_image');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            $product = new Product;
            $product->name=$request->name;
            $product->sku=$request->sku;
            $product->manufacturer_id=$request->manufacturer;
            $product->category_id =$request->category;
            $product->subcategory_id=$request->subcategory;            
            $product->product_title=$request->product_title;
            $product->feature_image=$imageName;
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
            $product->model_no =$request->model_no;
            $product->specifications =$request->specification;
            $product->warranty=$request->warranty;
            $product->product_condition=$request->product_condition;
            $product->vat_status=$request->vat;
            $product->price=$request->price;
            $product->max_qty=$request->max_qty;
            $product->discount=$request->discount;
            $product->review=$request->review;
            $product->new_product=$request->new_product;
            $product->refurbished_product=$request->refurbished_product;
            $product->feature_product=$request->feature_product;
            $product->limited_product=$request->limited_product;
            $product->outofstock_product=$request->out_of_stock;
            $product->best_seller=$request->best_seller;
            $product->offer=$request->offer;
            $product->popular=$request->popular;
            $product->created_by = Session::get('user');
            $product->updated_by = Session::get('user');
            if($product->save()){
                $image->move(public_path('images'),$imageName);
                if($request->image){
                    foreach($request->image as $key=>$value){
                        $productimage=new Productimage;
    
                        $image = $request->file('image')[$key];
                        $imageName = Str::random(8).time().'.'.$image->extension();
           
                        $destinationPath = public_path('/images/thumbnails');
                        $img = Image::make($image->path());
                        $img->resize(100, 100)->save($destinationPath.'/'.$imageName);
                        //$img->resize(643, 640, function ($constraint) {$constraint->aspectRatio();})->save($destinationPath.'/'.$imageName);
                
                        $destinationPath = public_path('/images/product');
                        //$img->resize(643, 640)->save($destinationPath.'/'.$imageName);
                        $image->move($destinationPath, $imageName);
                        
                        $productimage->product_id=$product->id;
                        $productimage->image=$imageName;
                        
                        $productimage->save();
                    }
                }
                
                return redirect(route(Session::get('identity').'.product.index'))->with($this->responseMessage(true, null, "You have successfully added a product."));
            }
         }catch(Exception $e){
            return redirect(route(Session::get('identity').'.product.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       return view('backend.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $manufacturer=Manufacturer::all();
        $category=Category::all();
        $subcategory=Subcategory::where('category_id',$product->category_id)->get();
        return view('backend.product.edit',compact('product','manufacturer','category','subcategory'));
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
            $product = Product::find($id);
            $product->name=$request->name;
            $product->sku=$request->sku;
            $product->manufacturer_id=$request->manufacturer;
            $product->category_id =$request->category;
            $product->subcategory_id=$request->subcategory;            
            $product->product_title=$request->product_title;
            
            if($request->file('feature_image')){
                $image = $request->file('feature_image');
                $feature_image = '/source/public/images/'.time().'.'.$image->extension();
                $image->move(public_path('images'),$feature_image);
                $product->feature_image=$feature_image;
            }
            
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
            $product->model_no =$request->model_no;
            $product->specifications =$request->specification;
            $product->warranty=$request->warranty;
            $product->product_condition=$request->product_condition;
            $product->vat_status=$request->vat;
            $product->max_qty=$request->max_qty;
            $product->price=$request->price;
            $product->discount=$request->discount;
            $product->review=$request->review;
            $product->new_product=$request->new_product;
            $product->refurbished_product=$request->refurbished_product;
            $product->feature_product=$request->feature_product;
            $product->limited_product=$request->limited_product;
            $product->outofstock_product=$request->out_of_stock;
            $product->best_seller=$request->best_seller;
            $product->offer=$request->offer;
            $product->popular=$request->popular;
            $product->updated_by = Session::get('user');
            
            /* image for slider*/ 
            if($request->old_image){
                $oldimage=explode('/',$request->old_image);
                foreach($oldimage as $imgname){
                    $imgname=$imgname;
                    $oldimagedlt=Productimage::where('image',$imgname)->delete();
                    if(file_exists(public_path('/source/public/images/product/'.$imgname))){
                        unlink(public_path('/source/public/images/product/'.$imgname));
                    }
                    if(file_exists(public_path('/source/public/images/thumbnails/'.$imgname))){
                        unlink(public_path('/source/public/images/thumbnails/'.$imgname));
                    }
                }
            }
            if($request->image){
                foreach($request->image as $key=>$value){

                    $productimage=new Productimage;

                    $image = $request->file('image')[$key];
                    $imageName = Str::random(8).time().'.'.$image->extension();
       
                    $destinationPath = public_path('/images/thumbnails');
                    $img = Image::make($image->path());
                    $img->resize(100, 100)->save($destinationPath.'/'.$imageName);
                    //$img->resize(1920, 420, function ($constraint) {$constraint->aspectRatio();})->save($destinationPath.'/'.$imageName);
            
                    $destinationPath = public_path('/images/product');
                    $image->move($destinationPath, $imageName);
                    
                    $productimage->product_id=$product->id;
                    $productimage->image=$imageName;
                    
                    $productimage->save();
                }
            }
            /* image for slider*/
            
            if($product->save()){
                return redirect(route(Session::get('identity').'.product.index'))->with($this->responseMessage(true, null, "You have successfully updated a product."));
            }
         }catch(Exception $e){
            return redirect(route(Session::get('identity').'.product.index'))->with($this->responseMessage(false, "error", "Please try again!"));
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

    public function getcat(Request $request){
        $data = Subcategory::where('category_id',$request->cat_id)->get();
        $val = '<option value="">--Select Sub Category--</option>';
        foreach($data as $dat){
            $val.="<option value='".$dat->id."'>".$dat->name."</option>";
                }
                
        return $val;
    }
}
