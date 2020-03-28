<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class OpportunityLanguageRequirment extends Model
{
  
    protected $table = 'opportunity_language_requirment';

            protected $primaryKey = 'opportunity_id';
            protected $fillable = [
                'language_name','needed_proficency_level',
                'opportunity_id'
            ];
            protected $keyType = 'string';
            public $incrementing = false;

            public static function boot(){
            parent::boot();
            self::creating(function ($model) {
                $model->id = (string) Uuid::generate(4);
            });
        } 
          
        
            public function opportunity(){
                return $this->belongsToMany('App\Opportunity');
            }
}
