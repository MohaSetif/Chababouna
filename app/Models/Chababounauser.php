<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chababounauser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'surname', 'sex', 'job', 'day', 'month', 'year', 'place', 'residence', 'hobby', 'help', 'photo', 'email', 'scholar_year', 'tel', 'inscripred_in', 'status',
    ];
}
