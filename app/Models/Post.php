<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image'
    ];
    // Relacionamento Polimórfico
    public function postable()
    {
        return $this->morphTo();
    }

    // Relacionamento Tradicional
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