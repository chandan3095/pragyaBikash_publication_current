<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'name_english',
        'name_bengali',
        'parent_id'
    ];

    public function books(){
        return $this->hasMany(Book::class);
        
    }
}
