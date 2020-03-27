<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    protected $table = 'activity_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    protected $keyType = 'uuid';
    public $incrementing = false;
}
