<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

use App\Models\Company\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Company\AddNewRequest;
use Illuminate\Http\Company\UpdateRequest;
use App\Http\Traits\ResponseTrait;
use Session;
use Exception;

class CompanyController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('backend.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.company.create');
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
            $image = $request->file('image');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            $header = new Company;
            $header->name=$request->name;
            $header->feature_image=$imageName;
            
            if($header->save()){
                $image->move(public_path('images'),$imageName);
                
                return redirect(route(Session::get('identity').'.company.index'))->with($this->responseMessage(true, null, "You have successfully added a category."));
            }

        }catch(Exception $erer){
            dd($erer);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
