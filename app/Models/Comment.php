<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'comment_text',
        'user_id',
        'article_id',
        'parent_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function article(){
        return $this->belongsTo(Article::class);
    }

    // Relasi balasan (child comments)
    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Relasi komentar induk (parent comment)
    public function parent() {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
