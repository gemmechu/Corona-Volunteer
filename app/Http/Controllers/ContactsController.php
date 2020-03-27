<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
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
        $contact=Contact::create($input);
       return $contact->save()? $contact : "Couldnt save Contact" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Contact::find($id);
    }

    public function update(Request $request,  $id)
    {
        $contact = Contact::findOrFail($id);
        $input = $request->all();
        return $contact->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $contact = contact::findOrFail($id);
        $contact->delete();
    }
}
