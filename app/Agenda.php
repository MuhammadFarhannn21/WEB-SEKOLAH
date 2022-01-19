<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    // Table yg digunakan
    protected $table    = 'agenda';

    // Mass asignment
    protected $fillable = [
    	'title',
        'start',
        'end',
    ];
}
