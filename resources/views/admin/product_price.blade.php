@extends('admin.layouts.app')
@section('title','Harga Produk')
@section('content')
        <div class="row justify-content-center">
            <section class="bg-light p-3 mb-4">
                <form action="{{ url('/product/price')}}" method="post">
                    @csrf
                    {{-- ================= BRAND SELECT ==============================--}}
                    <div class="mb-3">
                        <label for="processor" class="form-label">Brand</label>
                        <select class="form-select" aria-label="Default select example"  name="brand_select">
                            <option selected disabled>Pilih Brand</option>
                                @foreach ($brands as $item)
                                    <option value="{{ $item->id}}" class="brand-option">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    {{-- ===================== SELECT PRODUCT ===================== --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Produk</label>
                        <select class="form-select @error('product_id') is-invalid @enderror" aria-label="Default select example" required name="product_id">
                            <option selected disabled>Pilih Produk</option>  
                          </select>
                          @error('product_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    {{-- =================== RAM STORAGE =========================  --}}
                    <div class="mb-3">
                        <label for="processor" class="form-label">Ram Storage</label>
                        <select class="form-select @error('ram_storage') is-invalid @enderror" aria-label="Default select example" required name="ram_storage">
                            <option selected disabled>Pilih Varian Storage & Ram</option> 
                            @foreach ($ramStorage as $item)
                                <option value="{{ $item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('ram_storage')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- ====================== HARGA NORMAL ============================= --}}
                    <div class="mb-3">
                        <label for="price_normal" class="form-label">Harga Normal</label>
                        <input type="number" class="form-control @error('price_normal') is-invalid @enderror" id="price_normal" placeholder="Masukan harga normal" name="price_normal">
                        @error('price_normal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- ======================== HARGA PROMO ================================ --}}
                    <div class="mb-3">
                        <label for="price_sale" class="form-label">Harga Promo</label>
                        <input type="number" class="form-control @error('price_sale') is-invalid @enderror" id="price_sale" placeholder="Masukan harga promo (optional)" name="price_sale">
                        @error('price_sale')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    {{-- ================== EXPIRED SALE =========================== --}}
                    <div class="mb-3">
                        <label class="form-label">Expired Sale</label>
                        <div class="col-4">
                            <input type="date" name="exp_sale" id="" class="form-control  @error('exp_sale') is-invalid @enderror" >
                        </div>
                        @error('exp_sale')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror  
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
        @include('sweet::alert')
@endsection
@push('child-script')
    <script src="{{ asset('js/product-request-by-brand.js')}}"></script>
@endpush