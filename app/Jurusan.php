<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    // Table yg digunakan
    protected $table    = 'jurusan';

    // Mass asignment
    protected $fillable = [
    	'judul',
	    'sub_judul',
	    'keterangan',
	    'gambar',
    ]; 
}
