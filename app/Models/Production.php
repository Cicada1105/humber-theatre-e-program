<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_active',
        'title',
        'authors',
        'poster_img_src',
        'directors',
        'choreographers',
        'poster_img_caption',
        'blurb',
        'content_warning',
        'special_thanks',
        'senior_dean',
        'associate_dean',
        'head_of_carpentry',
        'theatre_director',
        'head_of_properties',
        'voice_professor',
        'academic_program_manager',
        'head_of_lighting',
        'head_of_wardrobe',
        'head_of_movement',
        'head_of_sound',
        'head_of_paint',
        'technical_director',
        'pso'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
