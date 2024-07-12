@extends('frontend.layouts.default')
<style>
    /* .container {
        position: relative;
        display: inline-block;
    }
    .image {
        display: block;
    } */
    .text-overlay {
        position: absolute;
            top: 10px;
            right: 10px;
            background-color: #FF0000; /* Red background */
            color: #FFFFFF; /* White text */
            padding: 4px 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
            border-radius: 10px; /* Rounded corners */
    }
 
        .full-width-text {
            width: 100%;
            word-wrap: break-word; /* Ensures the text will wrap */
        }

</style>

@section('content')
    <div id="mainBody">
        <!-- Navbar -->
        <section class="primaryBgColor mx-auto navSection">
            <!-- Your Navbar code here -->
        </section>

        <!-- Header Section -->
        <div id="header">
            <section class="container detailsContainer orderBoxContainer">
                <div class="row orderBoxContainer row-cols-1 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 g-2 g-lg-3">
                    <!-- Product Image and Details -->
                    <div class="col">
                        <div class="carousel-item active">
                            <img src="{{ $productDetails->image }}" class="d-block w-100" alt="..." />
                            @if($productDetails->stock == "no")
                            <div class="text-overlay">Stock Out</div>
                           @endif
                        </div>
                    </div>

                    <div class="col">
                        <div class="p-2">
                            <h4>{{ $productDetails->product_name }}</h4>
                            <div class="d-flex align-items-center w-100 detailsPrice">
                                <h6 class="text-decoration-line-through">৳{{ $productDetails->old_price }}</h6>
                                <h5 class="ml-4">৳{{ $productDetails->new_price }}</h5>
                            </div>
                            <div class="d-flex align-items-center orderBox">
                                <span class="minus">-</span>
                                <span id="currentQuantity">1</span>
                                <span class="plus">+</span>
                                <a href="{{ route('order.create', $productDetails->id) }}" id="orderButton">
                                    <button class="d-flex orderBtn" {{ $productDetails->stock == "no" ? 'disabled' : '' }}>
                                        <i class="bi bi-basket-fill cartIcon"></i> অর্ডার করুন
                                    </button>
                                </a>
                            </div>
                            <div class="w-100 text-center contactNo">
                                <h4>প্রয়োজনে কল করুন - 01876506993</h4>
                            </div>
                            <p class="note">
                                প্রিয় ক্রেতা, অর্ডার করার আগে প্রোডাক্টি সম্পর্কে ভালো মত জানুন , প্রয়োজনে কল করে জানতে
                                পারবেন। বিশেষ অনুরোধ যদি প্রয়োজন হয় তবেই শুধু অর্ডার করবেন, অন্যথায় আপনার ও আমাদের মূল্যবান
                                সময় নষ্ট করবেন না। ধন্যবাদ
                            </p>
                            <div class="delevaryFeeBox d-block">
                                <div class="outOfData d-flex justify-content-between border-bottom">
                                    <p>ঢাকায় ডেলিভারি খরচ</p>
                                    <p>৳120</p>
                                </div>
                                <div class="div d-flex justify-content-between border-bottom">
                                    <p>ঢাকার বাইরের ডেলিভারি খরচ</p>
                                    <p>৳60</p>
                                </div>
                            </div>
                        </div>
                    </div>
 <!-- descriptions  -->
 <div class="col descriptionContainer">
    <div class="p-2">
        <h1 class="border-bottom">Desciptions</h1>
        <div class="DesciptionsText">
            {!! $productDetails->description !!}
        </div>
    </div>
</div>
<!-- descriptions end  -->

<!-- products Gallary  -->
<div class="col descriptionContainer">
    <div class="p-2">
        @if ($productDetails->cartificate_1)
     
            <p class="note">
                আমাদের এই পণ্য বাংলাদেশে science ল্যাব কতৃক পরীক্ষিত 
                এবং অনুমোদন প্রাপ্ত। ১০০%পার্সেন্ট সাইড ইফেক্ট মুক্ত ফুড সাপ্লিমেন্ট।
            </p>
            <h4 class="fw-bold"><i class="bi bi-award-fill award-icon"></i>Cartifacate<i class="bi bi-award-fill award-icon"></i> </h4>

        <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 g-2 mb-4">
                           <div class="col">
                    <div class="p-2 productsGallaryImg">
                        <img src="{{ $productDetails->cartificate_1 }}" class="d-block w-100"
                            alt="..." />
                    </div>
                </div>
            @endif

        </div>




        <h4 class="fw-bold "><i class="bi bi-star-fill award-icon"></i>Review<i class="bi bi-star-fill award-icon"></i></h4>
        <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 g-2">
        
            @if ($productDetails->review_1)
                <div class="col">
                    <div class="p-2 productsGallaryImg">
                        <img src="{{ $productDetails->review_1 }}" class="d-block w-100"
                            alt="..." />
                    </div>
                </div>
            @endif
            @if ($productDetails->review_2)
                <div class="col">
                    <div class="p-2 productsGallaryImg">
                        <img src="{{ $productDetails->review_2 }}" class="d-block w-100"
                            alt="..." />
                    </div>
                </div>
            @endif
            @if ($productDetails->review_3)
                <div class="col">
                    <div class="p-2 productsGallaryImg">
                        <img src="{{ $productDetails->review_3 }}" class="d-block w-100"
                            alt="..." />
                    </div>
                </div>
            @endif
            @if ($productDetails->cartificate_2)
                <div class="col">
                    <div class="p-2 productsGallaryImg">
                        <img src="{{ $productDetails->cartificate_2 }}" class="d-block w-100"
                            alt="..." />
                    </div>
                </div>
            @endif
            @if ($productDetails->cartificate_3)
                <div class="col">
                    <div class="p-2 productsGallaryImg">
                        <img src="{{ $productDetails->cartificate_3 }}" class="d-block w-100"
                            alt="..." />
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- products Gallary end -->
</div>
</div>
</div>
</div>
<!-- products Gallary end -->
                </div>
        </div>
        </section>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        function updateOrderButtonUrl() {
            var quantity = $('#currentQuantity').text();
            var orderButton = $('#orderButton');
            var baseUrl = orderButton.attr('href').split('?')[0]; // Remove existing query params
            orderButton.attr('href', baseUrl + '?quantity=' + quantity);
        }

        $('.plus').click(function(){
            var quantityElement = $('#currentQuantity');
            var currentQuantity = parseInt(quantityElement.text());
            quantityElement.text(currentQuantity + 1);
            updateOrderButtonUrl();
        });

        $('.minus').click(function(){
            var quantityElement = $('#currentQuantity');
            var currentQuantity = parseInt(quantityElement.text());
            if(currentQuantity > 1) {
                quantityElement.text(currentQuantity - 1);
                updateOrderButtonUrl();
            }
        });

        updateOrderButtonUrl(); // Initialize the button URL on page load
    });
</script>
@endsection
