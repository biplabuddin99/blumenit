<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Str;
use Image;

class GeneralSettingController extends Controller
{
    use ResponseTrait;
    public function edit(){
        $gs=GeneralSetting::first();
        return view('backend.gs.edit',compact('gs'));
    }

    public function update(Request $request, $id)
    {
        try{
            // DB::beginTransaction();
            $gs= GeneralSetting::findOrFail($id);
            $gs->company_name=$request->company_name;
            $gs->shipping_charge=$request->shipping_charge;
             if($gs->save()){
                return redirect()->back()->with($this->responseMessage(true, null, "Data Saved!"));
            }
        }catch(Exception $e){
            dd($e);
            // DB::rollBack();
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }
}
