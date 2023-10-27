<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'surname', 'sex', 'job', 'DadJob', 'MomJob', 'day', 'month', 'year', 'place', 'residence', 'photo', 'email', 'scholar_year', 'tel'
    ];
}

class ABC extends Model {

    const UPDATED_AT = null;

}