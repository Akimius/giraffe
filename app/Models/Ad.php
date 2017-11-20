<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Ad extends Model
{
    // public $timestamps = false; // just in case created at and updated at not required

    protected $fillable = ['title', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
