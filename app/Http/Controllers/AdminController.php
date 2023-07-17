<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function add_product(){
        return view('menu.admin.product.add_product');
    }
    public function store_add_product(Request $request)
    {

        $request->validate([
            'name'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
            'amount'=> 'required',
            'image'=> 'required',
        ]);
        $file = $request->file('image');
        $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'amount' => $request->amount,
            'image' => $path
        ]);
        return Redirect::route('add_product');
    }
    public function show_product()
    {
        $products = Product::all();
        return view('menu.admin.product.show_product', compact('products'));
    }
    public function edit(Product $product)
    {
        return view('menu.admin.product.edit_product', compact('product'));
    }
    public function update(Product $product, Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
            'amount'=> 'required',
            'image'=> 'required',
        ]);
        $file = $request->file('image');
        $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'amount' => $request->amount,
            'image' => $path
        ]);
        return Redirect::route('show_product');
    }
    public function delete(Product $product)
    {
        $product->delete();
        return Redirect::back();
    }
}
