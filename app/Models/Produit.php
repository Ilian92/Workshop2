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
        'images',
        'quantite',
        'type_animal_id',
        'pilier_id',
    ];

    /**
     * Cast attributes to native types.
     */
    protected $casts = [
        'images' => 'array',
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

    /**
     * Get the commandes for the produit through produit_commande pivot table.
     */
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'produit_commande', 'produit_id', 'commande_id')
                    ->withPivot('quantite', 'prixUnitaire')
                    ->withTimestamps();
    }

    /**
     * Get the main image URL.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                return $this->image;
            }
            return asset('storage/' . $this->image);
        }

        if ($this->images && is_array($this->images) && !empty($this->images)) {
            $firstImage = $this->images[0];
            if (str_starts_with($firstImage, 'http://') || str_starts_with($firstImage, 'https://')) {
                return $firstImage;
            }
            return asset('storage/' . $firstImage);
        }

        return 'https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=300&h=300&fit=crop';
    }

    /**
     * Get all images URLs.
     */
    public function getImagesUrlsAttribute()
    {
        $urls = [];

        if ($this->image) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                $urls[] = $this->image;
            } else {
                $urls[] = asset('storage/' . $this->image);
            }
        }

        if ($this->images && is_array($this->images)) {
            foreach ($this->images as $image) {
                if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
                    $urls[] = $image;
                } else {
                    $urls[] = asset('storage/' . $image);
                }
            }
        }

        return !empty($urls) ? $urls : ['https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=300&h=300&fit=crop'];
    }

    /**
     * Add an image to the product.
     */
    public function addImage($imagePath)
    {
        $images = $this->images ?: [];
        $images[] = $imagePath;
        $this->images = $images;
        $this->save();
    }

    /**
     * Remove an image from the product.
     */
    public function removeImage($imagePath)
    {
        $images = $this->images ?: [];
        $images = array_filter($images, fn($img) => $img !== $imagePath);
        $this->images = array_values($images);
        $this->save();
    }
}
