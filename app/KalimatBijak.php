<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KalimatBijak extends Model
{
    // Table yg digunakan
    protected $table    = 'kalimatbijak';

    // Mass asignment
    protected $fillable = [
    	'nama',
        'gambar',
        'kalimat',
    ];
}
