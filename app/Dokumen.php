<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    // Table yg digunakan
    protected $table    = 'dokumen';

    // Mass asignment
    protected $fillable = [
    	'judul',
	    'file',
    ]; 
}
