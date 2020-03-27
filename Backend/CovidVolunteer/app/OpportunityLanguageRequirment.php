<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpportunityLanguageRequirment extends Model
{
  
    protected $table = 'opportunity_language_requirement';

            protected $primaryKey = 'opportunity_id';
            protected $fillable = [
                'language_name','needed_proficency_level'
            ];
            protected $keyType = 'uuid';
            protected $incrementing = false;
              
          
        
            public function opportunity(){
                return $this->belongsToMany('App\Opportunity');
            }
}
