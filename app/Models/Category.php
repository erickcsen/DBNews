<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = ['name', 'slug','is_active','user_id'];

    public function user() {
        
        return $this->belongsTo(User::class);
    }

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function video()
    {
        return $this->hasMany(Video::class);
    }
}
