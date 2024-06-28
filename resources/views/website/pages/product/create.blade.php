@extends('website.layouts.default')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Create product</h3>
                    </div>
                </div>
            </div>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
            @endif --}}
            <div class="white_card_body">
                <form method="POST" action="{{ route('product.store') }}" id="createProduct" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label" for="name">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="product_name"
                            placeholder="Enter product name" value="{{ old('product_name') ? old('product_name') : '' }}"
                            required />
                        @error('product_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image">Old Price</label>
                        <input type="number" name="old_price" class="form-control" id="price"
                            placeholder="Enter old price" step="0.01"
                            value="{{ old('old_price') ? old('old_price') : '' }}" required />
                        @error('old_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image"> New Price</label>
                        <input type="number" name="new_price" class="form-control" id="price"
                            placeholder="Enter new price" step="0.01"
                            value="{{ old('new_price') ? old('new_price') : '' }}" required />
                        @error('new_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image">Weight</label>
                        <input type="text" name="weight" class="form-control" placeholder="Enter weight" 
                            value="{{ old('weight') ? old('weight') : '' }}" required />
                        @error('weight')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image">Stock</label>
      
                                <select class="form-control" name="stock" value="{{ old('stock') ? old('stock') : '' }}" required >
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
        
                        @error('stock')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <label class="form-label" for="image">Description</label>
                    <div class="mb-3">
                        <textarea rows="5" id="description" class="ckeditor form-control  @error('description') is-invalid @enderror"
                            name="description"></textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label" for="price">Image</label>
                            <input type="file" name="image" class="form-control" id="image"
                                placeholder="Choose image" accept="image/gif, image/jpeg" />
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <img src="https://placehold.co/200x200" id="imgPreview" class="w-50">
                        </div>
                    </div>
                    {{-- ------------------ Review Start ------------- --}}
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label" for="price">Review-1</label>
                            <input type="file" name="review_1" class="form-control" id="review_1"
                                placeholder="Choose image" accept="image/gif, image/jpeg" />
                            @error('review_1')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <img src="https://placehold.co/200x200" id="review1Preview" class="w-50">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label" for="price">Review-2</label>
                            <input type="file" name="review_2" class="form-control" id="review_2"
                                placeholder="Choose image" accept="image/gif, image/jpeg" />
                            @error('review_2')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <img src="https://placehold.co/200x200" id="review2Preview" class="w-50">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label" for="price">Review-3</label>
                            <input type="file" name="review_3" class="form-control" id="review_3"
                                placeholder="Choose image" accept="image/gif, image/jpeg" />
                            @error('review_3')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <img src="https://placehold.co/200x200" id="review3Preview" class="w-50">
                        </div>
                    </div>

                    {{-- ------------------ Review End ------------- --}}

                    {{-- ------------------ Cartificate Start ------------- --}}
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label" for="price">Cartificate-1</label>
                            <input type="file" name="cartificate_1" class="form-control" id="cartificate_1"
                                placeholder="Choose image" accept="image/gif, image/jpeg" />
                            @error('cartificate_1')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <img src="https://placehold.co/200x200" id="cartificate1Preview" class="w-50">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label" for="price">Cartificate-2</label>
                            <input type="file" name="cartificate_2" class="form-control" id="cartificate_2"
                                placeholder="Choose image" accept="image/gif, image/jpeg" />
                            @error('cartificate_2')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <img src="https://placehold.co/200x200" id="cartificate2Preview" class="w-50">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label" for="price">Cartificate-3</label>
                            <input type="file" name="cartificate_3" class="form-control" id="cartificate_3"
                                placeholder="Choose image" accept="image/gif, image/jpeg" />
                            @error('cartificate_3')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <img src="https://placehold.co/200x200" id="cartificate3Preview" class="w-50">
                        </div>
                    </div>
                    {{-- ------------------ Cartificate End ------------- --}}

                    <a href="{{ back()->getTargetUrl() }}" type="submit" class="btn btn-warning">Back</a>
                    <button type="submit" class="btn btn-primary"> Submit </button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('content-js')
    <script>
        $(document).ready(() => {
            $('#image').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });

        $(document).ready(() => {
            $('#review_1').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#review1Preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $('#review_2').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#review2Preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $('#review_3').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#review3Preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $('#cartificate_1').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#cartificate1Preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $('#cartificate_2').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#cartificate2Preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $('#cartificate_3').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#cartificate3Preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
