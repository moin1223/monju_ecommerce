@extends('frontend.layouts.default')
<style>
    .container {
        position: relative;
        display: inline-block;
    }
    .image {
        display: block;
    }
    .text-overlay {
        position: absolute;
            top: 10px;
            right: 10px;
            background-color: #FF0000; 
            color: #FFFFFF; /* White text */
            padding: 4px 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
            border-radius: 10px; /* Rounded corners */
    }
</style>

@section('content')
@include('frontend.includes.slider')
    <div class="container">
        <div class="allProductsText">
            <h1>All Products</h1>
        </div>


        <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 g-3 g-lg-3 mb-5">

            @foreach ($products as $key => $product)
                <div class="col products">
                    <div class="p-2 productsImg position-relative">
                        <img src="{{$product->image}}" alt="" />
                        @if($product->stock == "no")
                        <div class="text-overlay">Stock Out</div>
                       @endif
                        <div class="my-6 productsText">
                            <h4>{{ $product->product_name}}</h4>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center w-100">
                                    <span class="text-decoration-line-through">৳{{ $product->old_price }}</span>
                                    <span class="presentPrice">৳{{ $product->new_price }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="my-4">{{ $product->weight }}</span>
                        <div class="position-absoulate hoverProducts">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                {{-- <input type="number" name="quantity" value="1" min="1"> --}}
                                <button type="submit" class="buttonBgColor addToCart" id="addToCart" {{ $product->stock == "no" ? 'disabled' : '' }}>
                                    <i class="bi bi-basket-fill cartIcon"></i> Add to Cart
                                </button>
                            </form>
                  
                            <a href="{{ route('product-details',$product->id) }}">
                                <button class="buttonBgColor addToCart">Details</button></a>
                        </div>
                        <a href="{{ route('order.create',$product->id) }}">
                            <button class="orderNow" id="orderNow" {{ $product->stock == "no" ? 'disabled' : '' }}>অর্ডার করুন</button>
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection
@section('js')
@if(Session::has('message'))
<script>

Swal.fire({
    title: "Thank You!",
            html: "<p>❤️ Your order is confirmed ❤️</p><p>You will get the product within 2-3 days.</p>",
            icon: "success",
            confirmButtonText: "OK"
});
</script>
@endif
@endsection
