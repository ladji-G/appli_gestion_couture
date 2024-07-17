<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class commande extends Model
{
    use HasFactory;
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function couturier():BelongsTo
    {
        return $this->belongsTo(Couturier::class);
    }

    public function mesure():BelongsTo
    {
        return $this->belongsTo(mesure::class);
    }

    public function panier():BelongsTo
    {
        return $this->belongsTo(panier::class);
    }

    protected $fillable = ["statut", "user_id", "employe_id"];
}
