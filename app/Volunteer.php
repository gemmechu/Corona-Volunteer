<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = "volunteer";
  
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name','last_name','birthdate',
        'gender','email','password','distance_willing_to_travel',
        'educational_level','employment_status',
        'disability_status','id_image','account_status'
    ];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot(){
    parent::boot();
    self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
    });
}
    public function contact(){
        return $this->belongsTo('App\Contact');
    }
 
    public function opportunity(){
        return $this->belongsTo('App\Opportunity');
    }

    public function setNewApiToken(){
        $this->api_token = $this->Str::uuid();
        $this->save();
    }
          
}
