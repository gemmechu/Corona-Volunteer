<?php

namespace App\Http\Controllers;

use App\Opportunity;
use App\ActivityType;
use App\Contact;
use App\OpportunityLanguageRequirment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;
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
    {   //oPPORTUNITY CONTACT
        $createdContact=Contact::create($request->input("contact_id"));
        if(!$createdContact->save()){
            return "Couldnt save Volunteer's contact".$createdContact;
        }
        $input = $request->all(); 
        $input["contact_id"]= $createdContact->id;
        $activityType=ActivityType::where('name',$input["activity_type"])->get()->first();             
         
        //OPPOURTUNITY  hex2bin($value)
         
        $uuid=uuid($input["organization_id"]);
        $input["organization_id"]= $uuid;
        $opportunity=Opportunity::create($input);
        $opportunity->activity_type=$activityType->id;
        $opportunity->contact_id=$createdContact->id;
        $opportunity->save()? $opportunity : "Couldnt save Opportunity" ;
        //LANGUAGE REQUIRMENT
        $volunteerLanguageRequirment=$input["opportunity_language_requirment"];        
        foreach($volunteerLanguageRequirment as $vLangReq) {
            $vLangReqCreated=new OpportunityLanguageRequirment(); 
            $vLangReqCreated->opportunity_id=$opportunity->id; 
            $vLangReqCreated->language_name=$vLangReq["name"];
            $vLangReqCreated->needed_proficency_level=$vLangReq["degree_proficency"];
            if(!$vLangCreated->save()){
                return "Couldnt save Volunteer's language".$vLangCreated;
            } 
        }
        return $opportunity;
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

