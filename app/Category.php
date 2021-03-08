<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    //định nghĩa relationship

    public function cate()
    {
        return $this->hasMany('App\Product');
    }
}
