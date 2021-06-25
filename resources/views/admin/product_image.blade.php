@extends('admin.layouts.app')
@section('title','Image Produk')
@push('child-script')
    <link rel="stylesheet" href="{{ asset('css/child-1.css')}}">
@endpush
@section('content')
@include('sweet::alert')
        <div class="row justify-content-center">
            <section class="bg-light p-3 mb-4 col-md-8">
                <form action="{{ url('/product/image')}}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="processor" class="form-label">Brand</label>
                        <select class="form-select" aria-label="Default select example"  name="brand_select">
                            <option selected disabled>Pilih Brand</option>
                            @foreach ($brands as $item)
                            <option value="{{ $item->id}}" class="brand-option">{{ $item->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product</label>
                        <select class="form-select" aria-label="Default select example" required name="product_id">
                            <option selected disabled>Pilih Product</option>  
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="normal_price" class="form-label">Nama Warna</label>
                        <input type="text" class="form-control" id="normal_price" placeholder="Masukan nama warna" name="color_name">
                    </div>
                    <div class="mb-3">
                        <label for="product_image" class="form-label">Image Product 1</label>
                        <input class="form-control product-image" type="file" id="product_image" name="product_images[]">
                        <img src="" class="img-thumbnail" >
                    </div>
                    <div class="mb-3">
                        <label for="product_image" class="form-label">Image Product 2</label>
                        <input class="form-control product-image" type="file" id="product_image" name="product_images[]"> 
                        <img src="" class="img-thumbnail" >
                    </div>
                    <div class="mb-3">
                        <label for="product_image" class="form-label">Image Product 3</label>
                        <input class="form-control product-image" type="file" id="product_image" name="product_images[]">
                        <img src="" class="img-thumbnail" >
                    </div>
                    <div class="mb-3">
                        <label for="product_image" class="form-label">Image Product 4</label>
                        <input class="form-control product-image" type="file" id="product_image" name="product_images[]">
                        <img src="" class="img-thumbnail" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
            {{-- ================== DAFTAR PRODUCT IMAGE ============ --}}
            
        </div>
@endsection
@push('child-script')
    <script src="{{ asset('js/product-request-by-brand.js')}}"></script>
    <script src="{{ asset('js/image-preview.js')}}"></script>
@endpush