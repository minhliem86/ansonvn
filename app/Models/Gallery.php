<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $table = 'galleries';

    protected $guarded = ['id'];

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'photoable');
    }
}
