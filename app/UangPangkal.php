<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UangPangkal extends Model
{
    // Table yg digunakan
    protected $table    = 'uang_pangkal';

    // Mass asignment
    protected $fillable = [
        'jenis_formulir_id',
        'user_id',
        'cicilan_1_jumlah',
        'cicilan_1_bukti',
        'cicilan_1_status',
        'cicilan_1_tanggal',
        'cicilan_2_jumlah',
        'cicilan_2_bukti',
        'cicilan_2_status',
        'cicilan_2_tanggal',
        'cicilan_3_jumlah',
        'cicilan_3_bukti',
        'cicilan_3_status',
        'cicilan_3_tanggal',
    ];

    public function jenisFormulir()
    {
        return $this->belongsTo(JenisFormulir::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'cicilan_1_tanggal' => 'datetime',
        'cicilan_2_tanggal' => 'datetime',
        'cicilan_3_tanggal' => 'datetime'
    ];
}
