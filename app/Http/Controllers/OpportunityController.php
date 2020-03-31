<?php

namespace App\Http\Controllers;
use App\Volunteer;
use App\Applicant;
use App\Opportunity;
use App\ActivityType;
use App\Contact;
use App\Organization;
use App\OpportunityLanguageRequirment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Collection;
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
        //$activityType=ActivityType::where('name',$input["activity_type"])->get()->first();             
         
        //OPPOURTUNITY   
        $organization=Organization::where('email',$input["organization_id"]["email"])->get()->first();
        $input["organization_id"]=$organization->id;
        //$input["activity_type"]=$activity_type->id;
        $opportunity=Opportunity::create($input);
        $opportunity->organization_id= $organization->id; 
       // $opportunity->activity_type=$activityType->id;
        $opportunity->contact_id=$createdContact->id;
        $opportunity->save()? $opportunity : "Couldnt save Opportunity" ;
        //LANGUAGE REQUIRMENT
        $volunteerLanguageRequirment=$input["opportunity_language_requirment"];        
        foreach($volunteerLanguageRequirment as $vLangReq) {
            $vLangReqCreated=new OpportunityLanguageRequirment(); 
            $vLangReqCreated->opportunity_id=$opportunity->id; 
            $vLangReqCreated->language_name=$vLangReq["name"];
            $vLangReqCreated->needed_proficency_level=$vLangReq["degree_proficency"];
            if(!$vLangReqCreated->save()){
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
    /**
     * Display the specified resource.
     *
     * @param  \App\Opportunity  $Opportunity
     * @return \Illuminate\Http\Response
     */
    public function opportunityByOrganizationId()
    {
        $input = $request->all(); 
        $opportunity=Opportunity::where('organization_id',$input["organization_id"])
                              ->get();
        return $opportunity;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Opportunity  $Opportunity
     * @return \Illuminate\Http\Response
     */
    public function applicantsForAnOpportunity()
    {
        $input = $request->all(); 
        $collection = collect([]);
        $applicants=Applicant::where('opportunity_id',$input["opportunity_id"])
                              ->get();
        foreach($applicant as $applicants ) {
           $volunteer=Volunteer::where('id',$applicant->volunteer_id)
                              ->get().first();
            $collection->put($applicant->id,$volunteer);
        }
        return $collection;
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

