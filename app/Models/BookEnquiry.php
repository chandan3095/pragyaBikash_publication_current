<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookEnquiry extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'book_id',
        'name',
        'email',
        'phone',
        'quantity',
        'address'
    ];

    public function book() {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
}
