<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];
    
    use HasFactory;
}
