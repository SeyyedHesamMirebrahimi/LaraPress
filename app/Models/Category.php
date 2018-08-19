<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Posts()
    {
        return $this->hasMany('App\Models\Articles');
    }
    protected $guarded = ['created_at'];
}
