<?php

namespace App\Http\Controllers;

use App\Volunteer;
use App\Contact;
use App\User;
use App\VolunteerInterest;
use App\LanguageVolunteer;
use App\ActivityType;
use App\VolunteerAvailableOn;
use Illuminate\Http\Request;
//use Eastwest\Json\Json;
//use Eastwest\Json\JsonException;
class VolunteerController extends Controller
{

 public $successStatus = 200;

   
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
    {   //Contact 
        $createdContact=Contact::create($request->input("contact_id"));
        if(!$createdContact->save()){
            return "Couldnt save Volunteer's contact".$createdContact;
        }
        $input = $request->all();  
        $input["contact_id"]= $createdContact->id;
        //volunteer
        $volunteer=Volunteer::create($input);
       // $volunteer->token = $volunteer->createToken("token")->accessToken;
       $volunteer->setNewApiToken(); 
       if(!$volunteer->save()){
            return "Couldnt save Volunteer's contact".$volunteer;
        }
        //avalibility
        $dayCount=$input["avaliable_on"];
       $user["name"] = $input["first_name"];
       $user["password"] = $input["password"];
       $user["email"] = $input["email"];
     
        foreach($dayCount as $day ) {
            $avalibilityOn=new VolunteerAvailableOn();        
            $avalibilityOn->volunteer_id=$volunteer->id;
            $avalibilityOn->time=$day["time"];
            $avalibilityOn->day=$day["day"];
            if(!$avalibilityOn->save()){
                return "Couldnt save Volunteer's avalibility date".$avalibilityOn;
            }
        } 
        //interest
        $vInterest=$input["volunteer_interest"];
        foreach($vInterest as $interest) {
            $createdVolunteerInterest=new VolunteerInterest();        
            $createdVolunteerInterest->volunteer_id=$volunteer->id;
            $activityType=ActivityType::where('name',$interest)->get()->first();
            $createdVolunteerInterest->activity_id=$activityType->id;
            if(!$createdVolunteerInterest->save()){
                return "Couldnt save Volunteer's interest date".$createdVolunteerInterest;
            } 
        }
        //language
        $volunteerLanguage=$input["language_volunteer"];        
        foreach($volunteerLanguage as $vLang) {
            $vLangCreated=new LanguageVolunteer(); 
            $vLangCreated->volunteer_id=$volunteer->id; 
            $vLangCreated->language_name=$vLang["name"];
            $vLangCreated->degree_proficency=$vLang["degree_proficency"];
            if(!$vLangCreated->save()){
                return "Couldnt save Volunteer's language".$vLangCreated;
            } 
        }
        $tokenUser = User::create($user);
        $success['token'] = $tokenUser->createToken('MyApp')->accessToken;  
         $success['name'] = $user->name;
        

          //return $volunteer;
          return response()->json(['success'=>$success],200);
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
