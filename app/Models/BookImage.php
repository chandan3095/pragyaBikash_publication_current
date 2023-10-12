<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BookImage extends Model
{
    use HasFactory;
    protected $guaded = [];
    protected $appends=['image_public'];

    protected $fillable = [
        'book_id',
        'image'
    ];


    // accessor
    protected function imagePublic():Attribute{
        return Attribute::make(
            get: fn($value)=> asset('/storage/'.$this->attributes['image'])
        );
    }
}
