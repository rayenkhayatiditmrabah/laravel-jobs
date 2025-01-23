<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    protected $fillable = ['nom_societe'];

    public function offres()
    {
        return $this->hasMany(Offre::class, 'idsociete');
    }
    use HasFactory;
}
