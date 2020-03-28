<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
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
