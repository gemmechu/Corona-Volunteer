<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerInterest extends Model
{
   
    #Volunteer Interest
    protected $table = 'volunteer_interest';
    protected $primaryKey = 'id';
  
    protected $keyType = 'uuid';
    protected $incrementing = false;
      
  

    public function volunteer(){
        return $this->belongsTo('App\Volunteer');
    }
    public function activityType(){
        return $this->belongsToMany('App\ActivityType');
    }
}
