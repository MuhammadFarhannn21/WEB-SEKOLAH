<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class GuruTerbaik extends Model
{
    protected $table = 'guruterbaik';
    protected $fillable = [
        'nama',
        'mata_pelajaran',
        'pesan',
        'periode',
        'status',
        'gambar',
        'tipe',
        'lulusan',
    ];
}