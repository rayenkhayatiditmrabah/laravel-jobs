<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public function societe()
    {
        return $this->belongsTo(Societe::class, 'idsociete');
    }

    public function postulations()
    {
        return $this->hasMany(Postulation::class, 'idoffre');
    }
    use HasFactory;
}
