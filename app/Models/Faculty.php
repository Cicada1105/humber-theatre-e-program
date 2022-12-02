<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\FacultyInvolvement;

class Faculty extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name'
    ];

    public function facultyInvolvement() {
        return $this->hasMany(FacultyInvolvement::class);
    }
}
