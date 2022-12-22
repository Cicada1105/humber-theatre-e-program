<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\FacultyInvolvement;

class FacultyRole extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role'
    ];

    public function facultyInvolvement() {
        return $this->hasMany(FacultyInvolvement::class);
    }
}
