<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageVolunteer extends Model
{
    protected $table = 'language_volunteer';

    protected $primaryKey = 'id';
    protected $fillable = [
        'language_name','degree_proficency'
    ];
    protected $keyType = 'uuid';
    protected $incrementing = false;
      
    public function volunteer(){
        return $this->belongsToMany('App\Volunteer');
    }
}
