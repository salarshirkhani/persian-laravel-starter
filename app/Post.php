<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'explain',
        'content',
        'writer',
        'pic',
        'file',
    ];

    protected $table = 'posts';
}
