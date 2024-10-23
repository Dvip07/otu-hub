<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Likes extends Model
{
    use SoftDeletes;

    public $table = 'likes';
    protected $fillable =
    [
        'post_id',
        'user_id'
    ];
    use HasFactory;
    
    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }
}