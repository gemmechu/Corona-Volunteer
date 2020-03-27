<?php

namespace App\Http\Controllers;

use App\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Opportunity::all();
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
        $opportunity=Opportunity::create($input);
       return $Opportunity->save()? $Opportunity : "Couldnt save Opportunity" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opportunity  $Opportunity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Opportunity::find($id);
    }

    public function update(Request $request,  $id)
    {
        $Opportunity = Opportunity::findOrFail($id);
        $input = $request->all();
        return $Opportunity->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $Opportunity = Opportunity::findOrFail($id);
        $Opportunity->delete();
    }
}

