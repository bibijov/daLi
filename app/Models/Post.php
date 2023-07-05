<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'likes',
        'content'
    ];
    protected $casts=[
        'likes'=>'integer',
    ];

    public function author(){
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::Class);
    }
}
