<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Commande::with('produits')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(Commande $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this order.');
        }

        $order->load('produits');

        return view('orders.show', compact('order'));
    }
}
