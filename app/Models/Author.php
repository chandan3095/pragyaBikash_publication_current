<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'name_english',
        'name_bengali',
        'name_hindi',
        'description_english',
        'description_bengali',
        'description_hindi',
        'image',
    ];

    public function books(){
        return $this->belongsToMany(Book::class)->withTimestamps();
    }

}
