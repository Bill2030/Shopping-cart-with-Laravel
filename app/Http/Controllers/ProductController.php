<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view("products.shop", compact("products"));
    }

    public function create()
    {
        return view("products.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $product = new Product();
        $product->name = $request->name;
        $product->price= $request->price;
        $product->description = $request->description;
        $product->image = 'images/'.$imageName;
        $product->save();
        return redirect()->route('products.shop')->with('success', 'Product created successfully.');
    }
    public function cart(){

      
        return view ('products.cart');
    }

    public function addcart($id)
    {
        $product = Product::findOrFail($id);

        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => 1, 
            'price' =>$product->price , 
            'weight' => 0, 
            'options' => 
            ['image' => $product->image
            ]]);
            return redirect()->back()->with('success','Product added successfully');
    }

    public function deletecart($id)
    {
        Cart::destroy($id);

        return redirect()->back()->with('success','Product deleted Successfully');
    }

    public function checkout()
    {
        return view ('products.checkout');
    }

    public function qtyincrement($id)
    {
        $product = Cart::get($id);
        $updateQty = $product->qty + 1;
        
        Cart::update($id, $updateQty);

        return redirect()->back()->with('success','Product Increment successfully');
    }

    public function qtydecrement($id)
    {
        $product = Cart::get($id);
        $updateQty = $product->qty - 1;
        
        Cart::update($id, $updateQty);

        return redirect()->back()->with('success','Product Decrement Successfully');
    }
   
}
