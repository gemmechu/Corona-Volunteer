<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Volunteer extends Model
{
    use HasApiTokens;
    protected $table = "volunteer";
  
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name','last_name','birthdate',
        'gender','email','password','distance_willing_to_travel',
        'educational_level','employment_status','contact_id',
        'disability_status','id_image','account_status','token'
    ];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot(){
    parent::boot();
    self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
        //$model->token = (string) Uuid::generate(4);
    });
}
    public function contact(){
        return $this->belongsTo('App\Contact');
    }
 
 

    /*public function setNewApiToken(){
        $this->attributes['token'] = $this->Str::uuid();
        $this->save();
    }
    */
          
}
