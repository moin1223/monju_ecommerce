@php
    $sliders = \App\Models\Slider::all();
@endphp

<!-- Header Section -->
<div id="header">
    <!-- carousel part  -->
</div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner carouselImg">
        @foreach ($sliders as $slider)
            <div class="carousel-item active">
                <img src="{{ $slider->image }}" class="d-block w-100" alt="">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
