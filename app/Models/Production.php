<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Faculty;
use App\Models\Contributions;

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
        'is_published',
        'title',
        'authors',
        'directors',
        'choreographers',
        'poster_img_src',
        'poster_img_caption',
        'directors',
        'choreographers',
        'blurb',
        'content_warning',
        'land_acknowledgment',
        'about_humber',
        'special_thanks'
    ];

    public function faculty() {
        return $this->hasOne(Faculty::class);
    }
    public function contributions() {
        return $this->hasMany(Contributions::class);
    }
}
