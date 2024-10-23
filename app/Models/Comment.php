<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Post
{
    use HasFactory;

    protected $fillable = [
      'content',
    ];
    public function post()
    {
        //return $this->belongsTo(Post::class);
        return $this->MorphOne(Post::class, 'portable');
    }
    public function topics(){
      return $this->belongsTo(Topic::class);
    }
}
