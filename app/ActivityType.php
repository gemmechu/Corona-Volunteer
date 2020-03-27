<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ActivityType extends Model
{
    protected $table = 'activity_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot(){
    parent::boot();
    self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
    });
}
}
