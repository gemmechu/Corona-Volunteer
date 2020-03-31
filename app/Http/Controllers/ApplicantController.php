<?php

namespace App\Http\Controllers;
use App\Applicant;
use App\ApprovedApplicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Applicant::all();
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
        $applicant=Applicant::where('volunteer_id',$input["volunteer_id"])
                            ->where('opportunity_id', $input["opportunity_id"])
                            ->get()->first();
        if(!empty($applicant)){
            return "This volunteer has already applied before for this opportunity";
        } 
        $applicant=Applicant::create($input);
        return $applicant->save()? $applicant : "Couldnt save applicant" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Applicant::find($id);
    }

    public function update(Request $request,  $id)
    {
        $applicant = Applicant::findOrFail($id);
        $input = $request->all();
        if (empty($input["status"])){
            if($input["status"]=="accepted"){
                $approvedApplicant=new ApprovedApplicant();        
                $approvedApplicant->applicant_id=$input["applicant_id"];
                if(!$approvedApplicant->save()){
                    return "Couldnt save approved applicant";
                }                
            }
        }
        if($applicant->fill($input)->save()){
            return ; 
        }
        return "Couldnt update status";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
    }
}
