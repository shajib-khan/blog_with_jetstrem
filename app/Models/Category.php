<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable =[
        'name',
        'slug',
        'parent_id',
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
