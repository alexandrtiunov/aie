<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{

    protected $fillable = [
        'name', 'user_id', 'sum', 'discription', 'wallet_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
}
