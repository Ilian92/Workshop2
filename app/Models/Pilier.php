<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilier extends Model
{
    protected $table = 'pilier';

    protected $fillable = [
        'nom',
        'descriptionCourte',
    ];

    /**
     * Get the produits for the pilier.
     */
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
