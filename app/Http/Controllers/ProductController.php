<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('website.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/product')) : null;

        $review_1 = $request->hasFile('review_1') ? Storage::url($request->review_1->store('public/review1')) : null;
        $review_2 = $request->hasFile('review_2') ? Storage::url($request->review_2->store('public/review2')) : null;
        $review_3 = $request->hasFile('review_3') ? Storage::url($request->review_3->store('public/review3')) : null;

        $cartificate_1 = $request->hasFile('cartificate_1') ? Storage::url($request->cartificate_1->store('public/cartificate1')) : null;
        $cartificate_2 = $request->hasFile('cartificate_2') ? Storage::url($request->cartificate_2->store('public/cartificate2')) : null;
        $cartificate_3 = $request->hasFile('cartificate_3') ? Storage::url($request->cartificate_3->store('public/cartificate3')) : null;


        // dd($image);
        Product::create([
            'product_name' => $request->product_name,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'weight' => $request->weight,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $image,
            'review_1' => $review_1,
            'review_2' => $review_2,
            'review_3' => $review_3,
            'cartificate_1' => $cartificate_1,
            'cartificate_2' => $cartificate_2,
            'cartificate_3' => $cartificate_3

        ]);
        return redirect()->route('product.index')->with(['message' => 'Product created successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('website.pages.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            if ($product->image) {
                $filename = substr($product->image, 17);
                Storage::delete('public/product/' . $filename);
            }
        }
        if ($request->hasFile('review_1')) {

            if ($product->review_1) {
                $filename = substr($product->review_1, 17);
                Storage::delete('public/review1/' . $filename);
            }
        }

        if ($request->hasFile('review_2')) {
            if ($product->review_2) {
                $filename = substr($product->review_2, 17);
                Storage::delete('public/review2/' . $filename);
            }
        }
        if ($request->hasFile('review_3')) {
            if ($product->review_3) {
                $filename = substr($product->review_3, 17);
                Storage::delete('public/review3/' . $filename);
            }
        }

        if ($request->hasFile('cartificate_1')) {
            if ($product->cartificate_1) {

                $filename = substr($product->cartificate_1, 17);

                Storage::delete('public/cartificate1/' . $filename);
            }
        }


        if ($request->hasFile('cartificate_2')) {
            if ($product->cartificate_2) {
                $filename = substr($product->cartificate_2, 17);
                Storage::delete('public/cartificate2/' . $filename);
            }
        }
        if ($request->hasFile('cartificate_3')) {
            if ($product->cartificate_3) {
                $filename = substr($product->cartificate_3, 17);

                Storage::delete('public/cartificate3/' . $filename);
            }
        }




        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/product')) : $product->image;

        $review_1 = $request->hasFile('review_1') ? Storage::url($request->review_1->store('public/review1')) : $product->review_1;
        $review_2 = $request->hasFile('review_2') ? Storage::url($request->review_2->store('public/review2')) : $product->review_2;
        $review_3 = $request->hasFile('review_3') ? Storage::url($request->review_3->store('public/review3')) : $product->review_3;

        $cartificate_1 = $request->hasFile('cartificate_1') ? Storage::url($request->cartificate_1->store('public/cartificate1')) : $product->cartificate_1;
        $cartificate_2 = $request->hasFile('cartificate_2') ? Storage::url($request->cartificate_2->store('public/cartificate2')) : $product->cartificate_2;
        $cartificate_3 = $request->hasFile('cartificate_3') ? Storage::url($request->cartificate_3->store('public/cartificate3')) : $product->cartificate_3;


        $product->update([
            'product_name' => $request->product_name,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'weight' => $request->weight,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $image,
            'review_1' => $review_1,
            'review_2' => $review_2,
            'review_3' => $review_3,
            'cartificate_1' => $cartificate_1,
            'cartificate_2' => $cartificate_2,
            'cartificate_3' => $cartificate_3
        ]);
        return redirect()->route('product.index')->with(['message' => 'Product updated successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with(['message' => 'Product deleted successfully', 'alert-type' => 'success']);
    }
    //Frontend
    public function productDetails($productId)
    {
        $productDetails = Product::findOrfail($productId);
        return view('frontend.pages.product-details', compact('productDetails'));
    }
}
