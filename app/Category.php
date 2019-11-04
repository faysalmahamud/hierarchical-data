<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['parent_id', 'name'];

    public function subcategories()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
}
