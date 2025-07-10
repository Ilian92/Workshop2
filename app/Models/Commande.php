<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'status',
        'user_id',
        'date_commande',
        'total',
        'adresse_livraison',
        'adresse_facturation',
    ];

    /**
     * Get the user that owns the commande.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the produit commandes for the commande.
     */
    public function produitCommandes()
    {
        return $this->hasMany(ProduitCommande::class);
    }
}
