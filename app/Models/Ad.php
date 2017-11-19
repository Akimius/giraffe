<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    // public $timestamps = false; // just in case created at and updated at not required

    protected $fillable = ['title', 'description', 'user_id'];

    public function getUser()
    {
        return $this->hasMany('App\User', 'user_id', 'id');
    }
}
