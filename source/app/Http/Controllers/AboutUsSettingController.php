<?php

namespace App\Http\Controllers;

use App\Models\AboutUsSetting;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Str;
use Image;

class AboutUsSettingController extends Controller
{
    use ResponseTrait;
    public function edit(){
        $about=AboutUsSetting::first();
        return view('backend.aboutussetting.edit',compact('about'));
    }

    public function update(Request $request, $id)
    {
        try{
            // DB::beginTransaction();
            $abs= AboutUsSetting::findOrFail($id);
            
            if($request->file('page_image')){
                $image = $request->file('page_image');
                $page_image = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                $img = Image::make($image->path());
                $img->resize(1920, 649)->save($destinationPath.'/'.$page_image);
                $abs->page_image='/source/public/images/about/'.$page_image;
            }
            if($request->file('fsecimage')){
                $image = $request->file('fsecimage');
                $fsecimage = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                $img = Image::make($image->path());
                $img->resize(852, 704)->save($destinationPath.'/'.$fsecimage);
                $abs->fsecimage='/source/public/images/about/'.$fsecimage;
            }
            $abs->fsectitle1=$request->fsectitle1;
            $abs->fsectitle2=$request->fsectitle2;
            $abs->fsectitle3=$request->fsectitle3;
            $abs->fsectitle4=$request->fsectitle4;
            $abs->fsectitle5=$request->fsectitle5;
            $abs->fsecdetails=$request->fsecdetails;

            /*if($request->file('visionimage')){
                $image = $request->file('visionimage');
                $visionimage = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                $img = Image::make($image->path());
                $img->resize(164, 164)->save($destinationPath.'/'.$visionimage);
                $abs->visionimage='/source/public/images/about/'.$visionimage;
            }*/
            if($request->file('visionimage')){
                $image = $request->file('visionimage');
                $visionimage = '/source/public/images/about/'.time().'.'.Str::random(8).time().'.'.$image->extension();
                $image->move(public_path('images/about'),$visionimage);
                $abs->visionimage=$visionimage;
             }
            $abs->visiondetails=$request->visiondetails;

            /*if($request->file('missionimage')){
                $image = $request->file('missionimage');
                $missionimage = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                $img = Image::make($image->path());
                $img->resize(164, 164)->save($destinationPath.'/'.$missionimage);
                $abs->missionimage='/source/public/images/about/'.$missionimage;
            }*/
            if($request->file('missionimage')){
                $image = $request->file('missionimage');
                $missionimage = '/source/public/images/about/'.time().'.'.Str::random(8).time().'.'.$image->extension();
                $image->move(public_path('images/about'),$missionimage);
                $abs->missionimage=$missionimage;
             }
            $abs->missiondetails=$request->missiondetails;
            
            if($request->file('goalsimage')){
                $image = $request->file('goalsimage');
                $goalsimage = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(164, 164)->save($destinationPath.'/'.$goalsimage);
                }else{
                    $image->move($destinationPath, $goalsimage);
                }
                $abs->goalsimage='/source/public/images/about/'.$goalsimage;
            }
            /*if($request->file('goalsimage')){
                $image = $request->file('goalsimage');
                $goalsimage = '/source/public/images/about/'.time().'.'.Str::random(8).time().'.'.$image->extension();
                $image->move(public_path('images/about'),$goalsimage);
                $abs->goalsimage=$goalsimage;
             }*/
            $abs->goalsdetails=$request->goalsdetails;

            $abs->promisetext=$request->promisetext;

            if($request->file('relationimage')){
                $image = $request->file('relationimage');
                $relationimage = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                $img = Image::make($image->path());
                $img->resize(360, 244)->save($destinationPath.'/'.$relationimage);
                $abs->relationimage='/source/public/images/about/'.$relationimage;
            }
            $abs->relationdetails=$request->relationdetails;

            if($request->file('targetimage')){
                $image = $request->file('targetimage');
                $targetimage = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(360, 244)->save($destinationPath.'/'.$targetimage);
                }else{
                    $image->move($destinationPath, $targetimage);
                }
                $abs->targetimage='/source/public/images/about/'.$targetimage;
            }
            $abs->targetdetails=$request->targetdetails;

            if($request->file('retailimage')){
                $image = $request->file('retailimage');
                $retailimage = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(360, 244)->save($destinationPath.'/'.$retailimage);
                }else{
                    $image->move($destinationPath, $retailimage);
                }
                $abs->retailimage='/source/public/images/about/'.$retailimage;
            }
            $abs->retaildetails=$request->retaildetails;
            $abs->visionlastdetails=$request->visionlastdetails;
            
            if($request->file('visionimage1')){
                $image = $request->file('visionimage1');
                $visionimage1 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(70, 80)->save($destinationPath.'/'.$visionimage1);
                }else{
                    $image->move($destinationPath, $visionimage1);
                }
                $abs->visionimage1='/source/public/images/about/'.$visionimage1;
            }
            $abs->visiondetails1=$request->visiondetails1;

            if($request->file('visionimage2')){
                $image = $request->file('visionimage2');
                $visionimage2 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(70, 80)->save($destinationPath.'/'.$visionimage2);
                }else{
                    $image->move($destinationPath, $visionimage2);
                }
                $abs->visionimage2='/source/public/images/about/'.$visionimage2;
            }
            $abs->visiondetails2=$request->visiondetails2;

            if($request->file('visionimage3')){
                $image = $request->file('visionimage3');
                $visionimage3 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(70, 80)->save($destinationPath.'/'.$visionimage3);
                }else{
                    $image->move($destinationPath, $visionimage3);
                }
                $abs->visionimage3='/source/public/images/about/'.$visionimage3;
            }
            $abs->visiondetails3=$request->visiondetails3;

            if($request->file('visionimage4')){
                $image = $request->file('visionimage4');
                $visionimage4 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(70, 80)->save($destinationPath.'/'.$visionimage4);
                }else{
                    $image->move($destinationPath, $visionimage4);
                }
                $abs->visionimage4='/source/public/images/about/'.$visionimage4;
            }
            $abs->visiondetails4=$request->visiondetails4;

            if($request->file('visionimage5')){
                $image = $request->file('visionimage5');
                $visionimage5 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(70, 80)->save($destinationPath.'/'.$visionimage5);
                }else{
                    $image->move($destinationPath, $visionimage5);
                }
                $abs->visionimage5='/source/public/images/about/'.$visionimage5;
            }
            $abs->visiondetails5=$request->visiondetails5;

            if($request->file('visionimage6')){
                $image = $request->file('visionimage6');
                $visionimage6 = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/about');
                if($image->extension()!="svg"){
                    $img = Image::make($image->path());
                    $img->resize(70, 80)->save($destinationPath.'/'.$visionimage6);
                }else{
                    $image->move($destinationPath, $visionimage6);
                }
                $abs->visionimage6='/source/public/images/about/'.$visionimage6;
            }
            $abs->visiondetails6=$request->visiondetails6;
            
            
             if($abs->save()){
                return redirect()->back()->with($this->responseMessage(true, null, "You have successfully added a category."));
            }
        }catch(Exception $e){
            dd($e);
            // DB::rollBack();
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }
}
