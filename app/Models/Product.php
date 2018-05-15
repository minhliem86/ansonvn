<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'photoable');
    }
}
