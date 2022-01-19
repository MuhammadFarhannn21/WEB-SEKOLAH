<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Table yg digunakan
    protected $table    = 'menu';

    // Mass asignment
    protected $fillable = [
        'nama',
        'jenis',
        'parent_id',
        'status',
        'link',
        'posisi',
        'isparent',
    ];
}
