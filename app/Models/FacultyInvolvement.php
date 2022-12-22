<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Faculty;
use App\Models\Production;
use App\Models\FacultyRole;

class FacultyInvolvement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id'
    ];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
    public function production() {
        return $this->belongsTo(Production::class);
    }

    public function facultyRole() {
        return $this->hasOne(facultyRole::class);
    }
}
