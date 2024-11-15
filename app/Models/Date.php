<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    // Déclare les champs autorisés pour l'assignation en masse
    protected $fillable = [
        'start', // Ajoute 'start' ici
        'end',   // Ajoute 'end' ici
    ];
}