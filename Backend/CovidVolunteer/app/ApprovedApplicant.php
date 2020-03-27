<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovedApplicant extends Model
{
    protected $table = 'approved_applicant';
    protected $primaryKey = 'id';
    protected $fillable = [
      'brief_description','rating'
    ];
    protected $keyType = 'uuid';
    protected $incrementing = false;
      
    public function volunteer(){
        return $this->belongsTo('App\Volunteer');
    }


    
}
