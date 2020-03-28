<?php

namespace App\Http\Controllers;

use App\ApprovedApplicant;
use Illuminate\Http\Request;

class ApprovedApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApprovedApplicant::all();
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
        $approvedApplicant=ApprovedApplicant::create($input);
       return $approvedApplicant->save()? $approvedApplicant : "Couldnt save ApprovedApplicant" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApprovedApplicant  $approvedApplicant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ApprovedApplicant::find($id);
    }

    public function update(Request $request,  $id)
    {
        $approvedApplicant = ApprovedApplicant::findOrFail($id);
        $input = $request->all();
        return $approvedApplicant->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $approvedApplicant = ApprovedApplicant::findOrFail($id);
        $approvedApplicant->delete();
    }
}
