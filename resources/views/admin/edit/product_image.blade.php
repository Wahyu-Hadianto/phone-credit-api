@extends('admin.layouts.app')
@section('title','Image Produk')
@push('child-script')
    <link rel="stylesheet" href="{{ asset('css/child-1.css')}}">
@endpush
@section('content')
@include('sweet::alert')
        <div class="row justify-content-center">
            <section class="bg-light p-3 mb-4 col-md-8">
                <form action="{{ url('/product/'.$product->id.'/image')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Product</label>
                        <select class="form-select" aria-label="Default select example" required name="select_product" disabled>
                            <option selected value="{{ $product->product_id }}">{{ $product->product->product_name }}</option>  
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="normal_price" class="form-label">Nama Warna</label>
                        <input type="text" class="form-control" id="normal_price" placeholder="Masukan nama warna" name="color_name" value="{{ $product->color_name }}">
                    </div>
                    @for ($i = 0; $i < 4; $i++)
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Image Product {{ $i+1 }}</label>
                            <input class="form-control product-image" type="file" id="product_image" name="product_images[]" value="{{ $images[$i]->image }}">
                            <img src="{{ asset('storage/'. $images[$i]->image) }}" class="img-thumbnail img-preview" >
                        </div>
                    @endfor
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </section>
            {{-- ================== DAFTAR PRODUCT IMAGE ============ --}}
            
        </div>
@endsection
@push('child-script')
    <script src="{{ asset('js/product-request-by-brand.js')}}"></script>
    <script src="{{ asset('js/image-preview.js')}}"></script>
@endpush