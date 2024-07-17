<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class mesure extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function mesure():HasMany
    {
        return $this->hasMany(commande::class);
    }
    
    protected $fillable = ["nom","epaule", "long_manche", "t_manche", "poitrine",
     "dos", "frappe", "ceinture", "long_pentalon", "cuisse", "bassin", "long_genou", "bas",
      "t_taille", "long_totale", "long_taille",'long_robe', "long_jupe", "epaule_manche", "user_id"];
}
