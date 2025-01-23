<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{


    public function offre()
    {
        return $this->belongsTo(Offre::class, 'idoffre');
    }

    public function societe()
    {
        return $this->belongsTo(Societe::class, 'idsociete');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    // Relation Many-to-One avec Offre
   
    use HasFactory;
}
