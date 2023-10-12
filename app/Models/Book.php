<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=[];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'english_name'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function images(){
        return $this->hasMany(BookImage::class);
    }

    public function authors() {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }
}