<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    protected $guarded = ['created_at'];

    protected $dates = ['deleted_at'];
}
