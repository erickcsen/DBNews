<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;
    protected $table = 'photos';

    protected $fillable = [
        'user_id',
        'name',
        'path',
        'size',
        'size_txt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
