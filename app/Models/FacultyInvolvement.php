<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Faculty;
use App\Models\Production;

class FacultyInvolvement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'involvement'
    ];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
    public function productions() {
        return $this->belongsTo(Production::class);
    }
}
