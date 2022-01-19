<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    // Table yg digunakan
    protected $table    = 'formulir';

    // Mass asignment
    protected $fillable = [
    	'user_id',
		'jenis_formulir_id',
		'nama_panggilan',
		'nisn',
		'alamat_sekolah',
		'asal_daerah_sekolah',
		'pilihan_pertama',
		'pilihan_kedua',
		'pilihan_ketiga',
		'kewarganegaraan',
		'anak_ke',
		'dari_berapa_bersaudara',
		'jumlah_saudara_tiri',
		'jumlah_saudara_angkat',
		'anak_yatim_piatu_angkat',
		'bahasa',
		'nama_orangtua_atau_wali',
		'no_hp_orangtua_atau_wali',
		'tinggal',
		'jarak_tempat_tinggal',
		'kesekolah_dengan',
		'keterangan_kesehatan',
		'berat_badan',
		'tinggi_badan',
		'golongan_darah',
		'penyakit_yg_pernah_diderita',
		'bakat_khusus',
		'prestasi_khusus',
		'ekskul_yg_diminati',
		'informasi_penerimaan',
		'berasal_dari_smp',
		'berasal_dari_smp_terletak',
		'dalam_memilih_sekolah',
		'alasan_anda_mendaftar',
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
