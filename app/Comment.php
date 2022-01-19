<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{  
	// Bagian paling penting jika tidak ada ini maka tidak bisa memasukkan data
    protected $fillable = [
        'post_id',
        'name', 
        'email', 
        'body', 
        'status'
    ];

    // Bagian untuk memanggil comment beserta post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
