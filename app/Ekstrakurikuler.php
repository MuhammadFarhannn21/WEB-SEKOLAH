<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakurikuler';
    protected $fillable = [
        'nama',
        'foto',
        'deskripsi',
        'pembina',
        'status',
    ];
}