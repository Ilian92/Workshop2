<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Smartphones
            [
                'name' => 'iPhone 15 Pro Max',
                'description' => 'Le dernier iPhone avec écran 6.7", puce A17 Pro, appareil photo 48MP et design en titane.',
                'price' => 1499.99,
                'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400',
                'stock' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Smartphone Android premium avec S Pen intégré, appareil photo 200MP et écran 6.8" AMOLED.',
                'price' => 1399.99,
                'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400',
                'stock' => 12,
                'is_active' => true,
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'description' => 'Smartphone Google avec IA intégrée, appareil photo exceptionnel et Android pur.',
                'price' => 999.99,
                'image' => 'https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?w=400',
                'stock' => 8,
                'is_active' => true,
            ],

            // Ordinateurs portables
            [
                'name' => 'MacBook Pro 16" M3 Max',
                'description' => 'Ordinateur portable professionnel avec puce M3 Max, 32GB RAM et écran Liquid Retina XDR.',
                'price' => 3499.99,
                'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400',
                'stock' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Dell XPS 15',
                'description' => 'Ordinateur portable Windows premium avec écran 4K OLED, RTX 4070 et design ultra-fin.',
                'price' => 2499.99,
                'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400',
                'stock' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'description' => 'Ordinateur portable business avec clavier exceptionnel, sécurité avancée et autonomie 20h.',
                'price' => 1899.99,
                'image' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=400',
                'stock' => 10,
                'is_active' => true,
            ],

            // Tablettes
            [
                'name' => 'iPad Pro 12.9" M4',
                'description' => 'Tablette professionnelle avec puce M4, écran Liquid Retina XDR et support Apple Pencil.',
                'price' => 1299.99,
                'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400',
                'stock' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Samsung Galaxy Tab S9 Ultra',
                'description' => 'Tablette Android 14.6" avec S Pen, écran AMOLED et autonomie exceptionnelle.',
                'price' => 1099.99,
                'image' => 'https://images.unsplash.com/photo-1585790050235-54d8c73f7216?w=400',
                'stock' => 4,
                'is_active' => true,
            ],

            // Montres connectées
            [
                'name' => 'Apple Watch Series 9',
                'description' => 'Montre connectée avec suivi de santé avancé, notifications intelligentes et design élégant.',
                'price' => 399.99,
                'image' => 'https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?w=400',
                'stock' => 20,
                'is_active' => true,
            ],
            [
                'name' => 'Samsung Galaxy Watch 6',
                'description' => 'Montre connectée Android avec Wear OS, suivi fitness et autonomie 40h.',
                'price' => 349.99,
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400',
                'stock' => 15,
                'is_active' => true,
            ],

            // Écouteurs
            [
                'name' => 'AirPods Pro 2',
                'description' => 'Écouteurs sans fil avec réduction de bruit active, audio spatial et charge sans fil.',
                'price' => 249.99,
                'image' => 'https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?w=400',
                'stock' => 25,
                'is_active' => true,
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Casque sans fil avec réduction de bruit exceptionnelle et qualité audio studio.',
                'price' => 399.99,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400',
                'stock' => 8,
                'is_active' => true,
            ],

            // Caméras
            [
                'name' => 'Sony A7 IV',
                'description' => 'Appareil photo hybride 33MP avec vidéo 4K, autofocus rapide et stabilisation IBIS.',
                'price' => 2499.99,
                'image' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=400',
                'stock' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Canon EOS R6 Mark II',
                'description' => 'Appareil photo Canon avec capteur 24MP, vidéo 4K 60p et autofocus Dual Pixel.',
                'price' => 2199.99,
                'image' => 'https://images.unsplash.com/photo-1510127034890-ba63a1270d81?w=400',
                'stock' => 5,
                'is_active' => true,
            ],

            // Gaming
            [
                'name' => 'PlayStation 5',
                'description' => 'Console de jeux nouvelle génération avec SSD ultra-rapide et graphismes 4K.',
                'price' => 499.99,
                'image' => 'https://images.unsplash.com/photo-1606813907291-d86efa9b94db?w=400',
                'stock' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'Xbox Series X',
                'description' => 'Console Microsoft avec puissance 12 TFLOPs, Quick Resume et Game Pass.',
                'price' => 499.99,
                'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=400',
                'stock' => 8,
                'is_active' => true,
            ],

            // Accessoires
            [
                'name' => 'Magic Keyboard',
                'description' => 'Clavier Apple avec touches scissor, rétroéclairage et design ultra-fin.',
                'price' => 99.99,
                'image' => 'https://images.unsplash.com/photo-1587829743481-4362a31d0797?w=400',
                'stock' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Magic Mouse',
                'description' => 'Souris Apple avec surface tactile, charge sans fil et design minimaliste.',
                'price' => 79.99,
                'image' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400',
                'stock' => 25,
                'is_active' => true,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
