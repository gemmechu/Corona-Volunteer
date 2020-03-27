<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Applicant::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $input = $request->all();    
        $applicant=Applicant::create($input);
       return $applicant->save()? $applicant : "Couldnt save applicant" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Applicant::find($id);
    }

    public function update(Request $request,  $id)
    {
        $applicant = Applicant::findOrFail($id);
        $input = $request->all();
        return $applicant->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
    }
}
