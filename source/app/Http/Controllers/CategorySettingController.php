<?php

namespace App\Http\Controllers;

use App\Models\CategorySetting;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Str;
use Image;

class CategorySettingController extends Controller
{
    use ResponseTrait;
    public function edit()
    {
        $cat=CategorySetting::first();
        return view('backend.categorysettings.edit',compact('cat'));
    }

    public function update(Request $request, $id)
    {
        try{
            // DB::beginTransaction();
            $abs= CategorySetting::findOrFail($id);
            
            if($request->file('mp_add')){
                $image = $request->file('mp_add');
                $mp_add = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                $img = Image::make($image->path());
                $img->resize(271, 435)->save($destinationPath.'/'.$mp_add);
                $abs->mp_add='/source/public/images/category/'.$mp_add;
            }
            
            if($request->file('fp_add')){
                $image = $request->file('fp_add');
                $fp_add = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                $img = Image::make($image->path());
                $img->resize(271, 435)->save($destinationPath.'/'.$fp_add);
                $abs->fp_add='/source/public/images/category/'.$fp_add;
            }
            
            if($request->file('large_add')){
                $image = $request->file('large_add');
                $large_add = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                $img = Image::make($image->path());
                $img->resize(1469, 238)->save($destinationPath.'/'.$large_add);
                $abs->large_add='/source/public/images/category/'.$large_add;
            }
            if($request->file('small_add1')){
                $image = $request->file('small_add1');
                $small_add1 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                $img = Image::make($image->path());
                $img->resize(459, 258)->save($destinationPath.'/'.$small_add1);
                $abs->small_add1='/source/public/images/category/'.$small_add1;
            }
            if($request->file('small_add2')){
                $image = $request->file('small_add2');
                $small_add2 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                $img = Image::make($image->path());
                $img->resize(459, 258)->save($destinationPath.'/'.$small_add2);
                $abs->small_add2='/source/public/images/category/'.$small_add2;
            }
            if($request->file('small_add3')){
                $image = $request->file('small_add3');
                $small_add3 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                $img = Image::make($image->path());
                $img->resize(459, 258)->save($destinationPath.'/'.$small_add3);
                $abs->small_add3='/source/public/images/category/'.$small_add3;
            }
            
            if($request->file('bs_add')){
                $image = $request->file('bs_add');
                $bs_add = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/category');
                $img = Image::make($image->path());
                $img->resize(271, 435)->save($destinationPath.'/'.$bs_add);
                $abs->bs_add='/source/public/images/category/'.$bs_add;
            }
            
            $abs->mp_add_link=$request->mp_add_link;
                $abs->fp_add_link=$request->fp_add_link;
                $abs->large_add_link=$request->large_add_link;
                $abs->small_add1_link=$request->small_add1_link;
                $abs->small_add2_link=$request->small_add2_link;
                $abs->small_add3_link=$request->small_add3_link;
                $abs->bs_add_link=$request->bs_add_link;
            
            
             if($abs->save()){
                return redirect()->back()->with($this->responseMessage(true, null, "You have successfully change category setting."));
            }
        }catch(Exception $e){
            dd($e);
            // DB::rollBack();
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }
}
