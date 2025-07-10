<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produit';

    protected $fillable = [
        'nom',
        'prix',
        'descriptionCourte',
        'descriptionLongue',
        'image',
        'quantite',
        'type_animal_id',
        'pilier_id',
    ];

    /**
     * Get the type animal that owns the produit.
     */
    public function typeAnimal()
    {
        return $this->belongsTo(TypeAnimal::class);
    }

    /**
     * Get the pilier that owns the produit.
     */
    public function pilier()
    {
        return $this->belongsTo(Pilier::class);
    }

    /**
     * Get the produit commandes for the produit.
     */
    public function produitCommandes()
    {
        return $this->hasMany(ProduitCommande::class);
    }
}
