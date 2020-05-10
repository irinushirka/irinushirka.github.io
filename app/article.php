<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = [
        'user_id', 'title', 'body', 'small_description', 'image',
    ];
}
