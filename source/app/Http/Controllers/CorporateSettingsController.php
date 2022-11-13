<?php

namespace App\Http\Controllers;

use App\Models\CorporateInquiry;
use App\Models\CorporateSettings;
use App\Models\Category;
use App\Models\CorporateLogo;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use Exception;
use Session;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CorporateSettingsController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $data=CorporateSettings::orderBy('id','DESC')->paginate(10);
        return view('backend.corporate.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::orderBy('name')->get();
        return view('backend.corporate.create',compact('category'));
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
            $cor = new CorporateSettings;
            $cor->category_id=1;//$request->category_id;
            $cor->order_no=$request->order_no;
            $cor->title=$request->title;
            $cor->title_green=$request->title_green;
            $cor->right_text=$request->right_text;
            $cor->status=$request->status;

            if($request->file('side_image')){
                $image = $request->file('side_image');
                $side_image = '/source/public/images/corporate/'.time().'.'.$image->extension();
                $image->move(public_path('images/corporate'),$side_image);
                $cor->side_image=$side_image;
             }
             
             if($cor->save()){
                foreach($request->image as $key=>$value){
                    $cimage=new CorporateLogo;
                    
                    $image = $request->file('image')[$key];
                    $imageName = Str::random(8).time().'.'.$image->extension();
                    $destinationPath = public_path('/images/corporate');
                    $img = Image::make($image->path());
                    $img->resize(119, 39)->save($destinationPath.'/'.$imageName);
                    
                    $cimage->corporate_settings_id=$cor->id;
                    $cimage->logo='/source/public/images/corporate/'.$imageName;
                    $cimage->save();
                }
                return redirect(route(Session::get('identity').'.corporate_setting.index'))->with($this->responseMessage(true, null, "You have successfully added a data."));
             }
        }catch(Exception $e){
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CorporateSettings  $corporateSettings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::orderBy('name')->get();
        $data= CorporateSettings::findOrFail($id);
        $logo = CorporateLogo::where('corporate_settings_id', $data->id)->get();
        return view('backend.corporate.edit',compact('data','logo','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CorporateSettings  $corporateSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            // DB::beginTransaction();
            $cor= CorporateSettings::findOrFail($id);
            $cor->category_id=1;//$request->category_id;
            $cor->order_no=$request->order_no;
            $cor->title=$request->title;
            $cor->title_green=$request->title_green;
            $cor->right_text=$request->right_text;
            $cor->status=$request->status;

            if($request->file('side_image')){
                $image = $request->file('side_image');
                $side_image = '/source/public/images/corporate/'.time().'.'.$image->extension();
                $image->move(public_path('images/corporate'),$side_image);
                $cor->side_image=$side_image;
             }
            
             
           /* image for slider*/ 
            if($request->old_image){
                $oldimage=explode('/',$request->old_image);
                foreach($oldimage as $imgname){
                    $imgname='/source/public/images/corporate/'.$imgname;
                    $oldimagedlt=CorporateLogo::where('logo',$imgname)->delete();
                    if(file_exists(public_path($imgname))){
                        unlink(public_path($imgname));
                    }
                }
            }
            if($request->image){
                foreach($request->image as $key=>$value){
                    $cimage=new CorporateLogo;
                    
                    $image = $request->file('image')[$key];
                    $imageName = Str::random(8).time().'.'.$image->extension();
                    $destinationPath = public_path('/images/corporate');
                    $img = Image::make($image->path());
                    $img->resize(119, 39)->save($destinationPath.'/'.$imageName);
                    
                    $cimage->corporate_settings_id=$id;
                    $cimage->logo='/source/public/images/corporate/'.$imageName;
                    $cimage->save();
                }
            }
            /* image for slider*/

             if($cor->save()){
                return redirect(route(Session::get('identity').'.corporate_setting.index'))->with($this->responseMessage(true, null, "You have successfully updated."));
            }
        }catch(Exception $e){
            
            dd($e);
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CorporateSettings  $corporateSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(CorporateSettings $corporateSettings)
    {
        //
    }
    
    /**
     * Display a listing of the Inquiry.
     *
     */
    public function inq_list(){
        $data=CorporateInquiry::orderBy('id','DESC')->paginate(10);
        return view('backend.corporate.inquiry',compact('data'));
    }
    
    /**
     * Change Inquiry Status.
     *
     */
     public function update_status($id,$status){
        try{
            $cor= CorporateInquiry::findOrFail($id);
            $cor->status=$status;
            if($cor->save()){
                return redirect()->back()->with($this->responseMessage(true, null, "You have successfully change data."));
            }
        }catch(Exception $e){
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }
}
