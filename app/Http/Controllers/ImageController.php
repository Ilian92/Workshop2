<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Produit;

class ImageController extends Controller
{
    /**
     * Upload une image pour un produit.
     */
    public function uploadProductImage(Request $request, Produit $produit)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $imagePath = $request->file('image')->store('products', 'public');

            if (!$produit->image && (!$produit->images || empty($produit->images))) {
                $produit->image = $imagePath;
                $produit->save();
            } else {
                $produit->addImage($imagePath);
            }

            return response()->json([
                'success' => true,
                'message' => 'Image uploadée avec succès',
                'image_url' => asset('storage/' . $imagePath),
                'image_path' => $imagePath
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'upload: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Supprimer une image d'un produit.
     */
    public function deleteProductImage(Request $request, Produit $produit)
    {
        $request->validate([
            'image_path' => 'required|string',
        ]);

        $imagePath = $request->input('image_path');

        try {
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            if ($produit->image === $imagePath) {
                $produit->image = null;
                $produit->save();
            } else {
                $produit->removeImage($imagePath);
            }

            return response()->json([
                'success' => true,
                'message' => 'Image supprimée avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtenir toutes les images d'un produit.
     */
    public function getProductImages(Produit $produit)
    {
        return response()->json([
            'success' => true,
            'images' => $produit->images_urls,
            'main_image' => $produit->image_url
        ]);
    }
}
