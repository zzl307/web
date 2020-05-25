<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'title', 'avatar', 'status'
    ];

    public static function status($status)
    {
        if ($status == 1) {
            return '发布';
        }else{
            return '未发布';
        }
    }
}
