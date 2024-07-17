<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class employe extends Model
{
    use HasFactory;

    public function commande(): BelongsTo
    {
        return $this->belongsTo(commande::class);
    }
    protected $fillable = ["Nom", "Prenom", "adresse", "telephone", "email",
     "position", "salaire_horaire", "image"];
}
