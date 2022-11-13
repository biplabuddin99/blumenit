<?php

namespace App\Http\Controllers;

use App\Models\GamingSetting;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Str;
use Image;

class GamingSettingController extends Controller
{
    use ResponseTrait;
    public function edit()
    {
        $game=GamingSetting::first();
        return view('backend.gamingsettings.edit',compact('game'));
    }

    public function update(Request $request, $id)
    {
        try{
            // DB::beginTransaction();
            $abs= GamingSetting::findOrFail($id);
            
            if($request->file('mp_add')){
                $image = $request->file('mp_add');
                $mp_add = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/gaming');
                $img = Image::make($image->path());
                $img->resize(271, 435)->save($destinationPath.'/'.$mp_add);
                $abs->mp_add='/source/public/images/gaming/'.$mp_add;
            }
            
            if($request->file('fp_add')){
                $image = $request->file('fp_add');
                $fp_add = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/gaming');
                $img = Image::make($image->path());
                $img->resize(271, 435)->save($destinationPath.'/'.$fp_add);
                $abs->fp_add='/source/public/images/gaming/'.$fp_add;
            }
            
            if($request->file('bs_add')){
                $image = $request->file('bs_add');
                $bs_add = Str::random(8).time().'.'.$image->extension();
                $destinationPath = public_path('/images/gaming');
                $img = Image::make($image->path());
                $img->resize(271, 435)->save($destinationPath.'/'.$bs_add);
                $abs->bs_add='/source/public/images/gaming/'.$bs_add;
            }
            
                $abs->mp_add_link=$request->mp_add_link;
                $abs->fp_add_link=$request->fp_add_link;
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
