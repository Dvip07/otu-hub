<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engagement extends Model
{
    protected $table = 'engagement';

    protected $fillable = [
        'community_id',
        'user_id',
        'user_role',
    ];

    
    use HasFactory;
}
