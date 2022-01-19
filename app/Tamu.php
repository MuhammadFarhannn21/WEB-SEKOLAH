<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
	// use SoftDeletes;

    // Table yg digunakan
    protected $table    = 'tamu';

    // Mass asignment
    protected $fillable = [
    	'acara_id',
        'nama',
        'instansi',
        'telepon',
        'email',
        'photo',
        'alamat',
        'keterangan',
    ];

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }
}
