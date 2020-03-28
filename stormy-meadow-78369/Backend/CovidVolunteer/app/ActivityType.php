<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'activity_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    protected $keyType = 'uuid';
    protected $incrementing = false;
        


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
  
}
