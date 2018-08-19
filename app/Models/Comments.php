<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
