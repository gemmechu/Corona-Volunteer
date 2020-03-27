<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicant';
    protected $primaryKey = 'id';
    protected $fillable = [
        'brief_description','status'
    ];
    protected $keyType = 'uuid';
    protected $incrementing = false;
      
    public function volunteer(){
        return $this->belongsTo('App\Volunteer');
    }

    public function opportunity(){
        return $this->belongsTo('App\Opportunity');
    }

}
