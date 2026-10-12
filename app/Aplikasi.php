<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    // Table yg digunakan
    protected $table    = 'aplikasi';

    // Mass asignment
    protected $fillable = [
    	'nama',
        'logo_fe',
        'logo_be',
        'logo_sub_be',
        'telepon',
        'email',
        'alamat',
        'waktu_buka',
        'keterangan',
        'copyright',
        'link_maps',
        'link_facebook',
        'link_youtube',
        'link_google',
        'link_instagram',
        'judul_jurusan',
        'judul_sub_jurusan',
        'judul_berita',
        'judul_sub_berita',
        'judul_guru',  
        'judul_sub_guru',  
        'judul_event',
        'judul_sub_event',
        'judul_gallery',
        'judul_sub_gallery',
        'gambar_login',
        'gambar_slider',
        'gambar_total_siswa',
        'gambar_footer',
        'jumlah_siswa',
        'jumlah_guru',
        'jumlah_prestasi',
        'jumlah_jurusan',
        'visi',
        'misi',
    ];
}
