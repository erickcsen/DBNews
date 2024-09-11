<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $table = 'sports';

    protected $fillable = [
        'user_id',
        'first_team', 
        'second_team', 
        'date', 
        'first_img', 
        'second_img'
    ];

    public function user() {
        
        return $this->belongsTo(User::class);
    }
}
