<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // Table yg digunakan
    protected $table    = 'gallery';

    // Mass asignment
    protected $fillable = [
    	'nama',
        'gambar',
        'status', // aktif or nonaktif
    ];
}
