<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Rules\BangladeshMobileNumber;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['items.product'])->get();
        // dd($orders);
        return view('website.pages.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $productId)
    {
        
        //  dd($request->quantity);
        $product = Product::findOrFail($productId);
        $quantity = $request->quantity ?? 1;

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
        // return view('frontend.pages.order', compact('cart'));
        return redirect()->route('cart.show');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//    dd($request->all());

$request->validate([
    'name' => 'required|string|max:255',
    'address' => 'required',
    'items' => 'required',
    'mobile_no' => ['required', new BangladeshMobileNumber()],
],
[
    'items.required' => 'Please select at least one product.',
]);

// Create a new order
$order = Order::create([
    'name' => $request->name,
    'address' => $request->address,
    'mobile_no' => $request->mobile_no,
    'sub_total' => $request->cart_subtotal,
    'delivery_charge' => $request->delivery_charge,
    'discount' => 0,
    'grand_total' => $request->cart_total,
    'status' => 'pending',
]);

// Create order items
foreach ($request->items as $item) {
    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $item['product_id'],
        'quantity' => $item['quantity'],
        'sub_total' => $item['sub_total'],
    ]);
}
Session::forget('cart');

return redirect()->route('home-page')->with('message', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($orderId)
    {
        $order = Order::with(['items.product'])->findOrFail($orderId);   
        return view('website.pages.order.edit', compact('order'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $orderId)
    {
        // dd($request->all());
        $order = Order::findOrFail($orderId); 
        $grand_total = ($order->grand_total-$request->discount);
        $discount = ($order->discount+$request->discount);
        $order->update([
            'status' => $request->status,
            'discount' => $discount,
            'grand_total' => $grand_total,

        ]);
        return redirect()->back()->with(['message' => 'Order deleted successfully', 'alert-type' => 'success']);
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($orderId)
    {

        // dd($orderId);
        $order = Order::findOrFail($orderId);
        $order->delete();
        return redirect()->back()->with(['message' => 'Order deleted successfully', 'alert-type' => 'success']);
    }

}
