<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function beranda()
    {
        $products = Product::all();
        return view('menu.user.product.index', compact('products'));
    }
    public function description(Product $product)
    {
        return view('menu.user.product.description', compact('product'));
    }
    public function add_cart(Product $product, Request $request)
    {
        $user = Auth::id();
        $product_id = $product->id();
        $request->validate([
            'amount' => 'required'
        ]);
        Cart::create([
            'user_id' => $user,
            'product_id' => $product_id,
            'amount' => $request->amount
        ]);
    }
}
