<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    public function estado(){
        return $this->belongsTo('App\Models\Estado');
    }

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
