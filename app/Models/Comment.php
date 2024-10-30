<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Post
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];
    // Relacionamento Polimórfico
    public function post()
    {
        return $this->morphOne(Post::class, 'postable');
    }

    // public function topic()
    // {
    //     return $this->belongsTo(Topic::class);
    // }
}