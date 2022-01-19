<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    // Table yg digunakan
    protected $table    = 'timeline';

    // Mass asignment
    protected $fillable = [
        'judul',
        'body',
        'featured',
        'link_youtube',
        'status',
        'posisi',
    ];
}
