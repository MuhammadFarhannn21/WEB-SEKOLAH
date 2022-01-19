<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemberkasan extends Model
{
    // Table yg digunakan
    protected $table    = 'pemberkasan';

    // Mass asignment
    protected $fillable = [
    	'jenis_formulir_id',
        'user_id',
        'ijazah_pdf',
        'pas_foto_2_3',
        'pas_foto_3_4',
        'kk',
        'akte_kelahiran',
        'ukuran_baju',
    ];

    public function jenisFormulir()
    {
        return $this->belongsTo(JenisFormulir::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
