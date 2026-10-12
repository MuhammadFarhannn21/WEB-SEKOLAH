<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class MitraPerusahaan extends Model
{
    protected $table = 'mitra_perusahaan';
    protected $fillable = [
        'nama',
        'logo',
        'bidang',
        'website',
        'deskripsi',
        'status',
    ];
}