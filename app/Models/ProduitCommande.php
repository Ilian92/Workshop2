<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduitCommande extends Model
{
    protected $table = 'produit_commande';

    protected $fillable = [
        'quantite',
        'prixUnitaire',
        'commande_id',
        'produit_id',
    ];

    /**
     * Get the commande that owns the produit commande.
     */
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    /**
     * Get the produit that owns the produit commande.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
