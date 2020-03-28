<?php

namespace App\Http\Controllers;

use App\OpportunityLanguageRequirment;
use Illuminate\Http\Request;

class OpportunityLanguageRequirmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OpportunityLanguageRequirment::all();
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
        $opportunityLanguageRequirment=OpportunityLanguageRequirment::create($input);
       return $opportunityLanguageRequirment->save()? $opportunityLanguageRequirment : "Couldnt save OpportunityLanguageRequirment" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OpportunityLanguageRequirment  $opportunityLanguageRequirment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return OpportunityLanguageRequirment::find($id);
    }

    public function update(Request $request,  $id)
    {
        $opportunityLanguageRequirment = OpportunityLanguageRequirment::findOrFail($id);
        $input = $request->all();
        return $opportunityLanguageRequirment->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $opportunityLanguageRequirment = OpportunityLanguageRequirment::findOrFail($id);
        $opportunityLanguageRequirment->delete();
    }
}
