<?php

namespace App\Models\post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts(){
        return $this->belongsToMany(Post::class, 'post_comment');
    }

    public function replies(){
      return  $this->hasMany(Comment::class, 'reply_id', 'id')->with('replies');
    }
}
