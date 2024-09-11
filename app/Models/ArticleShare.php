<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleShare extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'email',
        'ip_address',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
