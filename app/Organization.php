<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
   
    protected $table = 'organization';
    protected $primaryKey = 'id';
            protected $fillable = [
                'name','email','password',
                'contact_id',
                'website','account_status'
            ];
            protected $hidden = ['password'];
            protected $keyType = 'string';
            public $incrementing = false;

            public static function boot(){
            parent::boot();
            self::creating(function ($model) {
                $model->id = (string) Uuid::generate(4);
            });
           
            }
            public function contact(){
                return $this->belongsToMany('App\Contact');
            } 

          
}
