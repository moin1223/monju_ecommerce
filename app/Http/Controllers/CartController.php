<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $quantity = $request->input('quantity', 1);

        // Get the cart from the session or create a new one
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Add the product to the cart
            $cart[$productId] = [
                "name" => $product->product_name,
                "quantity" => $quantity,
                "price" => $product->new_price,
                // "photo" => $product->photo
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);

        // return redirect()->route('cart.show')->with('success', 'Product added to cart!');
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);

        return view('frontend.pages.order', compact('cart'));
    }


    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
            }
        }
        return response()->json(['success' => false, 'message' => 'Product not found in cart']);
    }
    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product added to cart!');
        }
    }

}
