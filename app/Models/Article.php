<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id',
        'category_id',
        'subcategory_id',
        'article_img',
        'is_active',
        'views',
        'share'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function subcategory() {
        return $this->belongsTo(Subcategory::class); 
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function article_view(){
        return $this->hasMany(ArticleView::class);
    }
}
