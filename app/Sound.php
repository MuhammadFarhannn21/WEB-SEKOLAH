<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    // Table yg digunakan
    protected $table    = 'sound';

    // Mass asignment
    protected $fillable = [
        'judul',
	    'lirik',
	    'file',
	    'view',
	    'published_at',
	    'status',
    ];
}
