<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'specialization',
        'academic_degree',
        'university_name',
        'experience_years',
        'bio',
        'rating',
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class,'user_id');
    }
}
