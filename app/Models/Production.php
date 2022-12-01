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
        'title',
        'author',
        'poster_img_src',
        'poster_img_caption',
        'blurb',
        'content_warning',
        'special_thanks'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
