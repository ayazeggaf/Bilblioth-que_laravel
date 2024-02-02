<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    public function auteur(){
        return $this->belongsTo(Auteur::class,'auteur_id');
    }
    public function emprunts(){
        return $this->hasMany(Emprunt::class,'livre_id');
    }

}
