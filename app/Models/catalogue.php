<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class catalogue extends Model
{

    use HasFactory;

    protected $fillable = ["genre", "Nom", "Desciption", "PrixEnf", "PrixAdu", "cover_image"];

    public function commandes(): HasMany
    {
        return $this->hasMany(commandes::class, 'catalogue_id');
    }
    
    public function paniers(): HasMany
    {
        return $this->hasMany(panier::class);
    }
}
