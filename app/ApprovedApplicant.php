<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class ApprovedApplicant extends Model
{
    protected $table = 'approved_applicant';
    protected $primaryKey = 'id';
    protected $fillable = [
      'brief_description','rating',
      'applicant_id'
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
