<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    protected $fillable = ['nom', 'type', 'année'];
    public function matchs()
    {
        return $this->hasMany(Matchs::class, 'idCompetition');
    }
}
