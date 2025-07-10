<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // Vérifier que les clés Stripe sont configurées
        if (!config('services.stripe.secret') || config('services.stripe.secret') === 'sk_test_...') {
            throw new \Exception('Clés Stripe non configurées. Veuillez configurer STRIPE_SECRET dans votre fichier .env');
        }
        
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $products = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $product->price * $quantity
                ];
                $total += $product->price * $quantity;
            }
        }

        if (empty($products)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide !');
        }

        // Créer l'intention de paiement Stripe
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => (int)($total * 100), // Stripe utilise les centimes, doit être un entier
                'currency' => 'eur',
                'metadata' => [
                    'user_id' => auth()->id(),
                    'cart_items' => count($products)
                ]
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            \Log::error('Erreur Stripe: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de l\'initialisation du paiement Stripe: ' . $e->getMessage());
        } catch (\Exception $e) {
            \Log::error('Erreur générale: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de l\'initialisation du paiement: ' . $e->getMessage());
        }

        return view('checkout.index', compact('products', 'total', 'paymentIntent'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        $products = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product && $product->stock >= $quantity) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $product->price * $quantity
                ];
                $total += $product->price * $quantity;
            }
        }

        if (empty($products)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide ou certains produits ne sont plus disponibles !');
        }

        try {
            DB::beginTransaction();

            // Créer la commande
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'ORD-' . time(),
                'total_amount' => $total,
                'status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'billing_address' => $request->billing_address,
            ]);

            // Créer les éléments de commande
            foreach ($products as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['product']->price,
                ]);

                // Mettre à jour le stock
                $item['product']->decrement('stock', $item['quantity']);
            }

            // Mettre à jour le statut de la commande
            $order->update([
                'status' => 'paid',
            ]);

            DB::commit();

            // Vider le panier
            session()->forget('cart');

            return redirect()->route('checkout.success', $order)->with('success', 'Votre commande a été traitée avec succès !');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Erreur lors du traitement de la commande: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors du traitement de votre commande: ' . $e->getMessage());
        }
    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}
