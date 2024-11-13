<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo', 
        'copies', 
        'note', 
        'parts', 
        'publication', 
        'documentation', 
        'review', 
        'writer_name', 
        'title', 
        'field'
    ];
}