<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class panier extends Model
{

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function couturiers(): BelongsTo
    {
        return $this->belongsTo(Couturier::class);
    }

    public function commande(): BelongsTo
    {
        return $this->belongsTo(commande::class);
    }

    use HasFactory;
    protected $fillable = ["statut", "bloquer", "user_id", "quantite", "photo"];
}
