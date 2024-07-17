<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class client extends Model
{
    use HasFactory;

     public function commandes(): HasMany
     {
         return $this->hasMany(commandes::class, 'client_id');
    }

    protected $fillable = ["genre", "Nom", "Prenom", "adresse", "telephone", "email",
     "date_dernier_commande"];
}
