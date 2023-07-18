<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


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
    public function add_cart(Request $request, Product $product)
    {
        $user = Auth::id();
        $product_id = $product->id;
        $request->validate([
            'amount' => 'required'
        ]);
        Cart::create([
            'user_id' => $user,
            'product_id' => $product_id,
            'amount' => $request->amount
        ]);
        return Redirect::back();
    }
    public function show_cart()
    {
        $carts = Cart::all();
        return view('menu.user.cart.index', compact('carts'));
    }
    public function checkout()
    {
        $user = Auth::id();
        $carts = Cart::where('user_id', $user)->get();

        if($carts == null)
        {
            return Redirect::back();
        }
        $order = Order::create([
            'user_id' => $user
        ]);
        foreach($carts as $cart)
        {
            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);
        }
        $cart->delete();
        return Redirect::route('show_transaction', $order);
    }
    public function show_transaction(Order $order)
    {
        return view('menu.user.transaction.index', compact('order'));
    }
    public function submit_payment(Order $order, Request $request){
        $file = $request->file('payment_recipe');
        $path = time().'_'.$order->id.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, file_get_contents($file));
        $order->update([
            'payment_recipe' => $path
        ]);
        return Redirect::back();
      }
      public function search(Request $request)
      {
          $keyword = $request->search;
          $products = Product::where('name', 'like', "%" . $keyword . "%")->paginate(5);
          return view('menu.user.product.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
      }  
     
}
