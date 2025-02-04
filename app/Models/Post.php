<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable =[
        'cover_image',
        'slug',
        'title',
         'body',
         'meta_description',
         'published_at',
         'featured',
         'author_id',
         'category_id',

        ];
    public function user(){
        return $this->belongsTo(User::class, 'author_id')->withDefault('Admin User');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
    public static function searchPost($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
    }
}
