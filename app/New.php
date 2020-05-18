<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'keyword', 'description',
    ];
}
