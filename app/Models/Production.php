<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\FacultyInvolvement;

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
        'special_thanks'
    ];

    public function facultyInvolvement() {
        return $this->hasMany(FacultyInvolvement::class);
    }
}
