<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
   
    protected $table = 'organization';
    protected $primaryKey = 'id';
            protected $fillable = [
                'name','email','password',
                'website','account_status'
            ];
            protected $hidden = ['password'];
            protected $keyType = 'uuid';
            protected $incrementing = false;
              
           
        
            public function contact(){
                return $this->belongsToMany('App\Contact');
            } 

          
}
