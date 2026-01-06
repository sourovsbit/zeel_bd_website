<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class SubUnit extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->create_by = Auth::user()->id;
        });
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit','unit_id');
    }
}
