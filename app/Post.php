<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Mass asignment
    protected $fillable = [
    	'user_id',
        'category_id',
        'slug',
        'title',
        'body',
        'status',
        'featured',
        'published_at',
        'view',
        'jenis',
        'jam_event',
    ];

    // Bagian untuk memanggil post beserta usersnya
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Bagian untuk memanggil post beserta category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Bagian untuk memanggil post beserta komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // bagian untuk format tanggal
    public function getDateAttribute()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }
}
