<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
