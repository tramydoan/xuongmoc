<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $table = 'products';
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    public function product_Images(){
        return $this->hasMany('App\ProductImage');
    }
    public function prd(){
        return $this->belongsToMany('App\Material','product_materials','product_id','material_id');
    }
}
