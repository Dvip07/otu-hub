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

    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
