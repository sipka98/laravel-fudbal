<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = ['name', 'address', 'years', 'phone', 'country', 'email'];

    public function fixtures()
    {
        return $this->hasMany(Fixture::class, 'home');
    }

    public function awayFixtures()
    {
        return $this->hasMany(Fixture::class, 'away');
    }
}
