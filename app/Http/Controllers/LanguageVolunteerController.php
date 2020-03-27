<?php

namespace App\Http\Controllers;

use App\LanguageVolunteer;
use Illuminate\Http\Request;

class LanguageVolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LanguageVolunteer::all();
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
        $languageVolunteer=LanguageVolunteer::create($input);
       return $languageVolunteer->save()? $languageVolunteer : "Couldnt save LanguageVolunteer" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LanguageVolunteer  $languageVolunteer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return LanguageVolunteer::find($id);
    }

    public function update(Request $request,  $id)
    {
        $languageVolunteer = LanguageVolunteer::findOrFail($id);
        $input = $request->all();
        return $languageVolunteer->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $languageVolunteer = LanguageVolunteer::findOrFail($id);
        $languageVolunteer->delete();
    }
}
