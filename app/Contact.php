<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
   
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $fillable = [
        'region','zone','city','subcity',
        'woreda','house_number','phone_number','emergency_contact'
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
