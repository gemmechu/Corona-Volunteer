<?php

namespace App\Http\Controllers;

use App\ActivityType;
use Illuminate\Http\Request;

class ActivityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActivityType::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function trial(){
        
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);    
        $input = $request->all();    
        $activityType=ActivityType::create($input);
       return $activityType->save()? $activityType : "Couldnt save Activity Type" ;
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ActivityType::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $activityType = ActivityType::findOrFail($id);

        $this->validate($request, [
            'name' => 'required' 
        ]);
        $input = $request->all();
        return $activityType->fill($input)->save(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uuid  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $activityType = ActivityType::findOrFail($id);
        $activityType->delete();
    }
}
