<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Mass asignment
    protected $fillable = [
    	'slug',
        'title',
    ];

    // Bagian untuk memanggil category beserta postnya
    // relasi one to many category to posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
