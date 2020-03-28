<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use App\Contact;
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Organization::all();
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
        $organization=Organization::create($input);
       return $organization->save()? $organization : "Couldnt save Organization" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $org=Organization::findOrFail($id);
        $contact=Contact::findOrFail($org->contact_id);
        $org->contact_id=$contact;
        return $org;
    }

    public function update(Request $request,  $id)
    {
        $org = Organization::findOrFail($id);       
        $input = $request->all();
        if(!empty($input["contact_id"])){
            $contact = Contact::findOrFail($org->contact_id); 
            $contact->fill($input["contact_id"])->save(); 
            $input["contact_id"]= $contact->id;
        }        
        return $org->fill($input)->save()?$org:"Couldnt update the organization";  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $organization = Organization::findOrFail($id);
        $contact = Contact::findOrFail($organization->contact_id);
        $organization->delete();
        $contact->delete();
    }
}

