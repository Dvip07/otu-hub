<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{

    protected $table = 'likes';

    protected $fillable = [
        'post_id',
        'user_id',
    ];

    
    use HasFactory;
}
