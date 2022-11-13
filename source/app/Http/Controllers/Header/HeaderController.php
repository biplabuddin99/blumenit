<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use App\Models\Headers\Header;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use Exception;
use Session;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Header::orderBy('id','DESC')->paginate(5);;
        return view('backend.headers.index',compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.headers.create');
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
            dd($$request);
            $image = $request->file('Logo');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            $video = $request->file('HeaderVideo');
            $videoName = '/source/public/images/'.time().'.'.$video->extension();
            $header = new Header;
            $header->logo=$imageName;
            $header->logo=$videoName;
            if($header->save()){
                $image->move(public_path('images'),$imageName);
                return redirect(route(Session::get('identity').'.header.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }

        }catch(Exception $erer){
            dd($erer);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Headers\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Headers\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit(Header $header)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Headers\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Header $header)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Headers\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
        //
    }
}
