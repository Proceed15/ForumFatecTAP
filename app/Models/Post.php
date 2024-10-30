<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id'
    ];

    // Relacionamento Polimórfico
    public function postable()
    {
        return $this->morphTo();
    }

    // public function topic()
    // {
    //     return $this->hasOne(Topic::class, 'id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
