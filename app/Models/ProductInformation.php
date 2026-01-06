<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class ProductInformation extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_informations';
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->create_by = Auth::user()->id;
        });
    }

    public function item()
    {
        return $this->belongsTo('App\Models\ProductItem','item_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory','category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\ProductSubCategory','sub_category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\ProductBrand','brand_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit','unit_id');
    }
}
