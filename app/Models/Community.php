<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Community extends Model
{
    use SoftDeletes;

    public $table = 'community';

    protected $fillable = [
        'name',
        'user_id',
        'avatar',
    ];
    use HasFactory;
}
