<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
  
            protected $table = 'opportunity';
            protected $primaryKey = 'id';
            protected $fillable = [
                'name','status','start_date','end_date',
                'end_date','brief_description','requirment_description',
                'minimum_age','number_of_volunteer_needed',
                'number_of_avaliable_spot'
            ];
            protected $keyType = 'string';
            public $incrementing = false;

            public static function boot(){
            parent::boot();
            self::creating(function ($model) {
                $model->id = (string) Uuid::generate(4);
            });
              
            public function organization(){
                return $this->belongsTo('App\Organization');
            }
        
            public function contact(){
                return $this->belongsTo('App\Contact');
            } 

            public function activityType(){
                return $this->belongsToMany('App\ActivityType');
            } 
}
