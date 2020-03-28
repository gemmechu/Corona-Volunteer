<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerAvailableOn extends Model
{

    protected $table = 'volunteer_available_on';
    protected $primaryKey = 'id';
    protected $fillable = [
        'time','time'
    ];
    protected $keyType = 'uuid';
    protected $incrementing = false;
      
  

    public function volunteer(){
        return $this->belongsTo('App\Volunteer');
    }
}
