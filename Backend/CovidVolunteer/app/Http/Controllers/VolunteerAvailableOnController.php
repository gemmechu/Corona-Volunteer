<?php

namespace App\Http\Controllers;

use App\VolunteerAvailableOn;
use Illuminate\Http\Request;

class VolunteerAvailableOnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VolunteerAvailableOn::all();
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
        $volunteerAvailableOn=VolunteerAvailableOn::create($input);
       return $volunteerAvailableOn->save()? $volunteerAvailableOn : "Couldnt save VolunteerAvailableOn" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VolunteerAvailableOn  $volunteerAvailableOn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VolunteerAvailableOn::find($id);
    }

    public function update(Request $request,  $id)
    {
        $volunteerAvailableOn = VolunteerAvailableOn::findOrFail($id);
        $input = $request->all();
        return $volunteerAvailableOn->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $volunteerAvailableOn = VolunteerAvailableOn::findOrFail($id);
        $volunteerAvailableOn->delete();
    }
}

