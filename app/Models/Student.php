<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'surname', 
        'sex', 
        'job', 
        'dad_job', 
        'mom_job', 
        'birthdate', 
        'place', 
        'residence', 
        'photo', 
        'email', 
        'scholar_year', 
        'tel',
        'dad_tel',
        'study_local',
        'status'
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }
}