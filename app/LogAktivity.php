<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogAktivity extends Model
{
	// Table yg digunakan
    protected $table    = 'log_aktivities';

    // Mass asignment
    protected $fillable = ['subject', 'url', 'method', 'ip', 'user_id','username'];
}
