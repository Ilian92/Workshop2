<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeAnimal extends Model
{
    use HasFactory;

    protected $table = 'typeanimal';

    protected $fillable = [
        'nom',
        'description',
    ];

    /**
     * Get the animals for the typeanimal.
     */
    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    /**
     * Get the produits for the typeanimal.
     */
    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
}
