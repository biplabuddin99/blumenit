<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Categoryimage;
use App\Models\Manufacturer;
use App\Models\ProductReview;
use App\Models\Wishlist;
use App\Models\AboutUsSetting;
use App\Models\CategorySetting;
use App\Models\GamingSetting;
use App\Models\CorporateSettings;
use App\Models\CorporateInquiry;
use App\Http\Traits\ResponseTrait;


class Frontend extends Controller{
    use ResponseTrait;
    public function index(){
        $slide = Slide::where('type',1)->orderBy('id','DESC')->get();
        $category = Category::where('feature_cat','1')->orderBy('id','DESC')->limit(6)->get();
        $manufacturer = Manufacturer::get();
        return view('frontend.front',compact('slide','category','manufacturer'));
    }

    public function games(){
        $slide = Slide::where('type',3)->orderBy('id','DESC')->get();
        $categories = Category::where('is_game','1')->get();
        $category = Category::where('is_game','1')->pluck('id');
        $gamsetting = GamingSetting::first();
        return view('frontend.games',compact('slide','category','categories','gamsetting'));
    }

    public function category(){
        $slide = Slide::where('type',2)->orderBy('id','DESC')->get();
        $category = Category::where('show_catpage',1)->orderBy('cat_page_order','DESC')->get();
        $categoryids = Category::where('is_game','0')->pluck('id');
        $catsetting = CategorySetting::first();
        return view('frontend.category',compact('slide','category','catsetting','categoryids'));
    }

    public function categoryview(Request $r,$id){
        $modelFilt=array();
        $subcatFilt=array();
        $manuFilt=array();
        if(isset($r->model))
            $modelFilt=explode(',',$r->model);
        if(isset($r->subcat))
            $subcatFilt=explode(',',$r->subcat);
        if(isset($r->manu))
            $manuFilt=explode(',',$r->manu);

        $subcats = Subcategory::where('category_id',$id)->get();
        $categorynam = Category::find($id);
        $slide=Categoryimage::where('category_id',$id)->get();

        $products = Product::where('category_id',$id);

        /* get manufacturer*/
        $menuids=$products->pluck('manufacturer_id');
        $manufacturer = Manufacturer::whereIn('id',$menuids)->get();

        /* model no */
        $models=$products->pluck('model_no','model_no');
        /* filters */
        if(count($modelFilt) > 0){
            $products = $products->whereIn('model_no',$modelFilt);
        }
        if(count($subcatFilt) > 0){
            $products = $products->whereIn('subcategory_id',$subcatFilt);
        }
        if(count($manuFilt) > 0){
            $products = $products->whereIn('manufacturer_id',$manuFilt);
        }

        $products = $products->paginate(20);

       return view('frontend.categoryview',compact('subcats','categorynam','slide','products','manufacturer','models','modelFilt','subcatFilt','manuFilt'));
    }
    
    public function subcategoryview(Request $r,$id){
        $modelFilt=array();
        $manuFilt=array();
        if(isset($r->model))
            $modelFilt=explode(',',$r->model);
        if(isset($r->manu))
            $manuFilt=explode(',',$r->manu);
            
        $subcat = Subcategory::find($id);
        $slide=Categoryimage::where('category_id',$subcat->category_id)->get();

        $products = Product::where('subcategory_id',$id);

        /* get manufacturer*/
        $menuids=$products->pluck('manufacturer_id');
        $manufacturer = Manufacturer::whereIn('id',$menuids)->get();

        /* model no */
        $models=$products->pluck('model_no','model_no');
        /* filters */
        if(count($modelFilt) > 0){
            $products = $products->whereIn('model_no',$modelFilt);
        }
        if(count($manuFilt) > 0){
            $products = $products->whereIn('manufacturer_id',$manuFilt);
        }

        $products = $products->paginate(20);

       return view('frontend.subcategoryview',compact('subcat','slide','products','manufacturer','models','modelFilt','manuFilt'));
    }
    
    public function shopview(Request $r){
        $modelFilt=array();
        $subcatFilt=array();
        $manuFilt=array();
        if(isset($r->model))
            $modelFilt=explode(',',$r->model);
        if(isset($r->subcat))
            $subcatFilt=explode(',',$r->subcat);
        if(isset($r->manu))
            $manuFilt=explode(',',$r->manu);

        
        $cats = Category::orderBy('name')->get();
        $slide = Slide::where('type',4)->orderBy('id','DESC')->get();

        $products = Product::where('name','!=','');

        /* get manufacturer*/
        $menuids=$products->pluck('manufacturer_id');
        $manufacturer = Manufacturer::whereIn('id',$menuids)->get();

        /* model no */
        $models=$products->pluck('model_no','model_no');
        /* filters */
        if(count($modelFilt) > 0){
            $products = $products->whereIn('model_no',$modelFilt);
        }
        if(count($subcatFilt) > 0){
            $products = $products->whereIn('category_id',$subcatFilt);
        }
        if(count($manuFilt) > 0){
            $products = $products->whereIn('manufacturer_id',$manuFilt);
        }

        $products = $products->paginate(20);

       return view('frontend.shopview',compact('slide','cats','products','manufacturer','models','modelFilt','subcatFilt','manuFilt'));
    }

    public function aboutus(){
        $about = AboutUsSetting::first();
        return view('frontend.aboutus',compact('about'));
    }
    
    public function contactus(){
        $about = AboutUsSetting::first();
        return view('frontend.contactus',compact('about'));
    }
    
    public function corporatebusiness(){
        $slide = Slide::where('type',5)->orderBy('id','DESC')->get();
        $data = CorporateSettings::where('status',1)->orderBy('order_no')->get();
        return view('frontend.corporate-business',compact('slide','data'));
    }
    
    public function corporatebusiness_inq(Request $request){
        try{
            $cor = new CorporateInquiry;
            $cor->title=$request->title;
            $cor->name=$request->name;
            $cor->contact=$request->contact;
            $cor->email=$request->email;
            $cor->address=$request->address;
            $cor->description=$request->description;
            $cor->status=0;
            if($cor->save()){
                return redirect()->back()->with($this->responseMessage(true, null, "You have successfully added a data."));
            }
        }catch(Exception $e){
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }
    public function search(Request $r){
        if($r->search){
            $products = Product::where('name', 'LIKE', '%'.$r->search.'%')
                                ->orWhere('model_no', 'LIKE', '%'.$r->search.'%')
                                ->orWhere('product_title', 'LIKE', '%'.$r->search.'%')
                                ->orWhere('product_condition', 'LIKE', '%'.$r->search)
                                ->paginate(20);
        }else{
            $products =false;
        }
        $search=$r->search;
        return view('frontend.search',compact('products','search'));
    }

    public function wishlist(){
        $wish = Wishlist::where('customer_id',session()->get('user'));
        
        if($wish->count() >0){
            $wish = $wish->pluck('product_id');
            $products = Product::whereIn('id',$wish)->get();
        }else{
            $products = false;
        }
        return view('frontend.wishlist',compact('products'));
    }

    
    public function product($id)
    {
        $categorynam= null;
        $data = null;
        $reviews=ProductReview::where('product_id',$id)->orderBy('rating','DESC')->get();
        $rating=ProductReview::where('product_id',$id)->avg('rating');
        $product = Product::find($id);
        $similar_products=Product::where('id','!=',$id)->where('category_id',$product->category_id)->orderBy('id','DESC')->limit(12)->get();
        return view('frontend.product',compact('rating','product','data','categorynam','similar_products','reviews'));
    }

    
}
