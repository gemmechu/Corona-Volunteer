<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
   
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $fillable = [
        'region','zone','city','subcity','subcity',
        'woreda','house_number','phone_number','emergency_contact'
    ];
    protected $keyType = 'uuid';
    protected $incrementing = false;
      
   
}
