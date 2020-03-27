<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Language::all();
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
        $language=Language::create($input);
       return $language->save()? $language : "Couldnt save Language" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Language::find($id);
    }

    public function update(Request $request,  $id)
    {
        $language = Language::findOrFail($id);
        $input = $request->all();
        return $language->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $language = Language::findOrFail($id);
        $language->delete();
    }
}
