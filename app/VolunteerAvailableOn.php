<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class VolunteerAvailableOn extends Model
{

    protected $table = 'volunteer_available_on';
    protected $primaryKey = 'id';
    protected $fillable = [
        'time','time'
    ];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot(){
    parent::boot();
    self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
    });
}
  

    public function volunteer(){
        return $this->belongsTo('App\Volunteer');
    }
}
