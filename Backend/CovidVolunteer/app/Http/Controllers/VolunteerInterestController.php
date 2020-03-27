<?php

namespace App\Http\Controllers;

use App\VolunteerInterest;
use Illuminate\Http\Request;

class VolunteerInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VolunteerInterest::all();
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
        $volunteerInterest=VolunteerInterest::create($input);
       return $volunteerInterest->save()? $volunteerInterest : "Couldnt save VolunteerInterest" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VolunteerInterest  $volunteerInterest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VolunteerInterest::find($id);
    }

    public function update(Request $request,  $id)
    {
        $volunteerInterest = VolunteerInterest::findOrFail($id);
        $input = $request->all();
        return $volunteerInterest->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $volunteerInterest = VolunteerInterest::findOrFail($id);
        $volunteerInterest->delete();
    }
}

