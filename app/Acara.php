<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    // Table yg digunakan
    protected $table    = 'acara';

    // Mass asignment
    protected $fillable = [
    	'nama',
    ];
}
