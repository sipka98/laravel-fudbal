<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $table = 'fixtures';

    protected $fillable = ['home', 'away', 'matchPlayed', 'score'];

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away');
    }
}
