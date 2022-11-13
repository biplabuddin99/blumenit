<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FootersupportRequest\UpdateRequest;
use App\Http\Requests\FootersupportRequest\CreateRequest;
use App\Models\Homefootersupportview;
use Exception;
use Session;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Str;

class HomeFootersupportController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Homefootersupportview::orderBy('id','DESC')->paginate(5);
        return view('backend.homefootersupport.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.homefootersupport.create');
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
            $image1 = $request->file('image1');
            $imageName1 = '/source/public/images/'.Str::random(8).time().'.'.$image1->extension();

            $image2 = $request->file('image2');
            $imageName2 = '/source/public/images/'.Str::random(8).time().'.'.$image2->extension();

            $image3 = $request->file('image3');
            $imageName3 = '/source/public/images/'.Str::random(8).time().'.'.$image3->extension();

            $image4 = $request->file('image4');
            $imageName4 = '/source/public/images/'.Str::random(8).time().'.'.$image4->extension();

           


            $support = new Homefootersupportview;
            // for ($i=1; $i < 6 ; $i++) { 
            //     $support->header_.$i.st = $request->title.$i;
            // }

            $support->header_1st = $request->title1;
            $support->header_2nd = $request->title2;
            $support->header_3rd = $request->title3;
            $support->header_4th = $request->title4;

            $support->details_1st = $request->details1;
            $support->details_2nd = $request->details2;
            $support->details_3rd = $request->details3;
            $support->details_4th = $request->details4;

            $support->image_1st = $imageName1;
            $support->image_2nd = $imageName2;
            $support->image_3rd = $imageName3;
            $support->image_4th = $imageName4;

            $support->created_by = Session::get('user');
            $support->updated_by = Session::get('user');

            if($support->save()){
                $image1->move(public_path('images'),$imageName1);
                $image2->move(public_path('images'),$imageName2);
                $image3->move(public_path('images'),$imageName3);
                $image4->move(public_path('images'),$imageName4);

                return redirect(route(Session::get('identity').'.footersupport.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));

            }
        }catch(Exception $e){
            dd($e);
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
    public function edit($id)
    {
        $data = Homefootersupportview::findOrFail($id);
        return view('backend.homefootersupport.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{

            $support = Homefootersupportview::findOrFail($id);


            $image1 = $request->file('image1');
            if($image1){
                $imageName1 = '/source/public/images/'.Str::random(8).time().'.'.$image1->extension();
                if(file_exists(public_path("$support->image_1st"))){
                     unlink(public_path("$support->image_1st"));
               }
               $support->image_1st=$imageName1;
           }
            

            $image2 = $request->file('image2');
            if($image2){
                $imageName2 = '/source/public/images/'.Str::random(8).time().'.'.$image2->extension();
                if(file_exists(public_path("$support->image_2nd"))){
                     unlink(public_path("$support->image_2nd"));
               }
               $support->image_2nd=$imageName2;
           }

            $image3 = $request->file('image3');
            if($image3){
                $imageName3 = '/source/public/images/'.Str::random(8).time().'.'.$image3->extension();
                if(file_exists(public_path("$support->image_3rd"))){
                     unlink(public_path("$support->image_3rd"));
               }
               $support->image_3rd=$imageName3;
           }

            $image4 = $request->file('image4');
            if($image4){
                $imageName4 = '/source/public/images/'.Str::random(8).time().'.'.$image4->extension();
                if(file_exists(public_path("$support->image_4th"))){
                     unlink(public_path("$support->image_4th"));
               }
               $support->image_4th=$imageName4;
           }

            


            
            // for ($i=1; $i < 6 ; $i++) { 
            //     $support->header_.$i.st = $request->title.$i;
            // }

            $support->header_1st = $request->title1;
            $support->header_2nd = $request->title2;
            $support->header_3rd = $request->title3;
            $support->header_4th = $request->title4;

            $support->details_1st = $request->details1;
            $support->details_2nd = $request->details2;
            $support->details_3rd = $request->details3;
            $support->details_4th = $request->details4;

            $support->updated_by = Session::get('user');

            if($support->save()){
                if($image1){
                    $image1->move(public_path('images'),$imageName1);
                }
                if($image2){
                    $image2->move(public_path('images'),$imageName2);
                }
               if($image3){ 
                   $image3->move(public_path('images'),$imageName3);
                 }
                if($image4){
                    $image4->move(public_path('images'),$imageName4);
                }
                

                return redirect(route(Session::get('identity').'.footersupport.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));

            }
        }catch(Exception $e){
            dd($e);
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
