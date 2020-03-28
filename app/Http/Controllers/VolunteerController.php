<?php

namespace App\Http\Controllers;

use App\Volunteer;
use App\Contact;
use App\VolunteerAvailableOn;
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
    public function login(Request $request)
    {
        $input = $request->all();
        $volunteer=Volunteer::where('email',$input["email"])
                              ->where('password', $input["password"])
                              ->where('account_status', "active")
                              ->get()->first();
        if(empty($volunteer)){
            return "Volunteer is not found";
        }
        
        $contact=Contact::findOrFail($volunteer->contact_id);
        $volunteer->contact_id=$contact;
        return $volunteer;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $createdContact=Contact::create($request->input("contact_id"));
        if(!$createdContact->save()){
            return "Couldnt save Volunteer's contact".$createdContact;
        }
        $input = $request->all();  
        $input["contact_id"]= $createdContact->id;

        $volunteer=Volunteer::create($input);        
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
        $volunteer=Volunteer::findOrFail($id);
        $contact=Contact::findOrFail($volunteer->contact_id);
        $volunteer->contact_id=$contact;
        return $volunteer;
    }

    public function update(Request $request,  $id)
    {
        $volunteer = Volunteer::findOrFail($id);       
        $input = $request->all();
        if(!empty($input["contact_id"])){
            $contact = Contact::findOrFail($volunteer->contact_id); 
            $contact->fill($input["contact_id"])->save(); 
            $input["contact_id"]= $contact->id;
        }
        
        return $volunteer->fill($input)->save()? $volunteer: "Couldnt update the volunteer"; 
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
        $contact = Contact::findOrFail($volunteer->contact_id);
        $volunteer->delete();
        $contact->delete();
    }
}
