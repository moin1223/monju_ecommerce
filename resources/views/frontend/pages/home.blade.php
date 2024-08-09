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
    {{-- <div class="container">
        <div class="allProductsText">
            <h1>All Products</h1>
        </div>


        <div class="row row-cols-2 row-cols-lg-4 row-cols-md-2 g-3 g-lg-3 mb-5">
            @foreach ($products as $key => $product)
                <div class="col products">
                    <div class="p-2 productsImg position-relative">
                        <img src="{{$product->image}}" alt="" />
                        @if($product->stock == "no")
                            <div class="text-overlay">Stock Out</div>
                        @endif
                        <div class="my-6 productsText">
                      
                            <h4>{{ \Illuminate\Support\Str::limit($product->product_name, 10, '..') }}</h4>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center w-100">
                                    <span class="text-decoration-line-through">৳{{ $product->old_price }}</span>
                                    <span class="presentPrice">৳{{ $product->new_price }}</span>
                                </div>
                            </div>
                        </div>
    
                        <div class="position-absoulate hoverProducts">
                            <div class="d-flex">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="buttonBgColor addToCart" id="addToCart" {{ $product->stock == "no" ? 'disabled' : '' }}>
                                        <i class="bi bi-basket-fill cartIcon"></i> Add
                                    </button>
                                </form>
                                <a href="{{ route('product-details',$product->id) }}">
                                    <button class="buttonBgColor addToCart">Details</button>
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('order.create',$product->id) }}">
                            <button class="orderNow" id="orderNow" {{ $product->stock == "no" ? 'disabled' : '' }}>অর্ডার করুন</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        


    </div> --}}
    <div class="px-2 container">
        <div class="text-uppercase my-2 mb-4 fw-bolder text-center">
          <h1><span>All Products</span></h1>
        </div>
        <div class="row row-cols-2 row-cols-lg-4 row-cols-md-4 row-cols-sm-3 g-2 g-lg-2">
          @foreach ($products as $key => $product)
           <div class="col">
            <a href="{{ route('product-details',$product->id) }}">
              <div class="p-2 productsImg position-relative">
                <img src="{{$product->image}}" alt="" />
                @if($product->stock == "no")
                <div class="text-overlay">Stock Out</div>
                @endif
                <div class="my-6 productsText">
                  <h4>{{$product->product_name}}</h4>
                  <div class="d-flex justify-content-between">
                    <div class="d-lg-flex d-md-flex d-block align-items-center w-100">
                      <span class="text-decoration-line-through">{{ $product->old_price }}৳</span>
                      <span class="mx-0 presentPrice mx-lg-3 mx-md-2 mx-0">{{ $product->new_price }}৳</span>
                    </div>
                  </div>
                </div>
                <span class="my-4 netWeight d-none">Net Weight: 100gm</span>
                <div class="">
                  <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="buttonBgColor addToCart" id="addToCart" {{ $product->stock == "no" ? 'disabled' : '' }}>
                        <i class="bi bi-handbag cartIcon"></i> Add To Cart
                    </button>
                </form>
                  <a href="{{ route('order.create',$product->id) }}">
                    <button class="orderNow" id="orderNow" {{ $product->stock == "no" ? 'disabled' : '' }}>অর্ডার করুন</button>
                </a>
                </div>
              </div>
            </a>
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
