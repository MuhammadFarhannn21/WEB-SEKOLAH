<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormulirPembayaran extends Model
{
    // Table yg digunakan
    protected $table    = 'formulir_pembayaran';

    // Mass asignment
    protected $fillable = [
    	'jenis_formulir_id',
        'user_id',
        'status',
        'bukti_pembayaran',
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
