<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuruTerbaik extends Model
{
    // Table yg digunakan
    protected $table    = 'guruterbaik';

    // Mass asignment
    protected $fillable = [
    	'nama',
		'mata_pelajaran',
		'pesan',
		'periode',
		'status', // aktif or nonaktif
        'gambar',
    ];
}
