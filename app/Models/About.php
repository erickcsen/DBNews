<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'abouts';

    protected $fillable = [
        'title', 
        'audience',
        'reader',
        'top_article',
        'visitor',
        'description',
        'commitment',
        'alamat',
        'telepon',
        'instagram',
        'facebook',
        'tiktok',
        'x',
        'about_img'
    ];
}
