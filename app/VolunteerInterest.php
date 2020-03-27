<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class VolunteerInterest extends Model
{
   
    protected $table = 'volunteer_interest';
    protected $primaryKey = 'id';
  
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot(){
    parent::boot();
    self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
    });
      
  

    public function volunteer(){
        return $this->belongsTo('App\Volunteer');
    }
    public function activityType(){
        return $this->belongsToMany('App\ActivityType');
    }
}
