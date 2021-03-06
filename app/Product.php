<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $fillable = [
        'name', 'category_id'
    ];

    public function operation() {
        return $this->hasMany('App\Operation');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
