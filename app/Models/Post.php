<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image'
    ];
    public function topic()
    {
        return $this->hasOne(Topic::class, $id);
        //return $this->MorphOne(Topic::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function postable()
    {
        //return $this->belongsTo(Post::class);
        return $this->MorphTo();
    }
    public function rates() {
        return $this->hasMany(Rate::class);
    }
}
