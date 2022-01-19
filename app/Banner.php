<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    // Table yg digunakan
    protected $table    = 'banner';

    // Mass asignment
    protected $fillable = [
    	'judul',
        'sub_judul',
        'posisi',
        'gambar',
        'status',
    ];
}
