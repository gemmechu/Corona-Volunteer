<?php

namespace App\Http\Controllers;

use App\Volunteer;
use App\Contact;
use Illuminate\Http\Request;
use Eastwest\Json\Json;
use Eastwest\Json\JsonException;
class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Volunteer::all();
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
        $volunteer=Volunteer::create($input);

        $contact=$volunteer->contact_id;
        $json = Json::decode( $contact,true);
        $createdContact=Contact::create($json);
        $savedContact=$createdContact->save();
        if(empty($savedContact)){
            return "Couldnt save Volunteer's contact".$createdContact;
        }
        $volunteer->contact_id = $savedContact->id;
        return $volunteer->save()? $volunteer : "Couldnt save Volunteer" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Volunteer::find($id);
    }

    public function update(Request $request,  $id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $input = $request->all();
        return $volunteer->fill($input)->save(); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->delete();
    }
}
