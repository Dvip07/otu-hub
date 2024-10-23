<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;
    public $table = 'posts';
    protected $fillable = [
        'text',
        'desc',
        'media',
        'links',
        'tags',
        'user_id',
    ]; 

    use HasFactory;

    public function likes()
    {
        return $this->hasMany(Likes::class, 'post_id');
    }
}
