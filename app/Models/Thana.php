<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Thana extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'thanas';
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->create_by = Auth::user()->id;
        });
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }
    
    public function division()
    {
        return $this->belongsTo('App\Models\DivisionSetup','division_id');
    }
    
    public function district()
    {
        return $this->belongsTo('App\Models\DistrictSetup','district_id');
    }
}
