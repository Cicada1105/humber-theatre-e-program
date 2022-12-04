<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contributor;
use App\Models\Production;

class Contribution extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
        'role'
    ];

    public function contributor() {
        return $this->belongsTo(Contributor::class);
    }
    public function production() {
        return $this->belongsTo(Production::class);
    }
}
