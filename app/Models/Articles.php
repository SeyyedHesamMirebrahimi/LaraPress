<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Articles extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->category = $this->category();
    }

    public $category;

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * @return mixed
     */public function getCategory()
    {
        return $this->category;
    }


    /**
     * @param mixed $category
     */public function setCategory(): void
    {
        $this->category = $this->category();
    }
    }
