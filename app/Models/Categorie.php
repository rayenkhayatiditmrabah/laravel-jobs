<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    public function offres()
    {
        return $this->hasMany(Offre::class);
    }
    use HasFactory;
}


