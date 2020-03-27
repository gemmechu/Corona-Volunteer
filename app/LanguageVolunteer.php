<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class LanguageVolunteer extends Model
{
    protected $table = 'language_volunteer';

    protected $primaryKey = 'id';
    protected $fillable = [
        'language_name','degree_proficency'
    ];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot(){
    parent::boot();
    self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
    });
      
    public function volunteer(){
        return $this->belongsToMany('App\Volunteer');
    }
}
