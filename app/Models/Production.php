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
        'dates',
        'location',
        'poster_img_src',
        'poster_img_caption',
        'directors',
        'blurb',
        'content_warning',
        'land_acknowledgment',
        'about_humber',
        'special_thanks'
    ];

    public function seniorDean() {
        return $this->hasOne(Faculty::class,'id','senior_dean');
    }
    public function associateDean() {
        return $this->hasOne(Faculty::class,'id','associate_dean');
    }
    public function headOfCarpentry() {
        return $this->hasOne(Faculty::class,'id','head_of_carpentry');
    }
    public function theatreDirector() {
        return $this->hasOne(Faculty::class,'id','theatre_director');
    }
    public function headOfProperties() {
        return $this->hasOne(Faculty::class,'id','head_of_properties');
    }
    public function voiceProfessor() {
        return $this->hasOne(Faculty::class,'id','voice_professor')   ;
    }
    public function academicProgramManager() {
        return $this->hasOne(Faculty::class,'id','academic_program_manager');
    }
    public function headOfLighting() {
        return $this->hasOne(Faculty::class,'id','head_of_lighting');
    }
    public function headOfWardrobe() {
        return $this->hasOne(Faculty::class,'id','head_of_wardrobe');
    }
    public function headOfMovement() {
        return $this->hasOne(Faculty::class,'id','head_of_movement');
    }
    public function headOfSound() {
        return $this->hasOne(Faculty::class,'id','head_of_sound');
    }
    public function headOfPaint() {
        return $this->hasOne(Faculty::class,'id','head_of_paint');
    }
    public function technicalDirector() {
        return $this->hasOne(Faculty::class,'id','technical_director');
    }
    public function Pso() {
        return $this->hasOne(Faculty::class,'id','pso');
    }
    public function contributions() {
        return $this->hasMany(Contributions::class);
    }
}
