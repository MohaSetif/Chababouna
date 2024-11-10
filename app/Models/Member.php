<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'surname', 
        'sex', 
        'job', 
        'birthdate', 
        'place', 
        'residence', 
        'hobby', 
        'help', 
        'photo', 
        'email', 
        'tel', 
        'status'
    ];
}
