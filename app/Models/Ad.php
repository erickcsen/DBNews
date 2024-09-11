<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $table = 'ads';

    protected $fillable = [
        'title',
        'link',
        'user_id',
        'position',
        'ad_img',
        'is_active'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
