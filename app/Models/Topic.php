<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Post
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'image',
        
    ];

    public function topic()
    {
        return $this->hsOne(Topic::class, 'idPost');
    }
    public function post()
    {
        //return $this->belongsTo(Post::class);
        return $this->MorphOne(Post::class, 'portable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
