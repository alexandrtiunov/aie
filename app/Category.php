<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title'
    ];

    public function operation() {
        return $this->hasMany('App\Operation');
    }

    public function product() {
        return $this->hasMany('App\Product');
    }
}
