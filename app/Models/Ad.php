<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description'];

    public function getUser()
    {
        return $this->hasMany('App\User', 'user_id', 'id');
    }
}
