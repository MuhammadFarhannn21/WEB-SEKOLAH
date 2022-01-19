<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class JenisFormulir extends Model
{
    use SoftDeletes;

    // Table yg digunakan
    protected $table    = 'jenis_formulir';

    // Mass asignment
    protected $fillable = [
    	'nama',
        'tahun_ajaran',
        'status',
        'biaya_formulir',
        'no_rekening',
        'nama_bank_rekening',
        'biaya_uang_pangkal',
        'minimal_uang_pangkal',
    ];
}
