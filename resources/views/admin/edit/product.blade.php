@extends('admin.layouts.app')
@section('title','Edit Produk')
@section('content')
    <div class="row justify-content-center">
        {{-- =========== FORM TAMBAH SERI ===============  --}}
        <section class="col-8 bg-light p-3 mb-4">
            <div class="mb-3">
                <h3>Tambah Product</h3>
            </div>
            <form action="{{ url('/product/'.$product->id)}}" method="POST">
                @method('PUT')
                @csrf
                {{-- ============== BRAND =============== --}}
                <div class="mb-3">
                    <select class="form-select @error('brand') is-invalid @enderror" aria-label="Default select example" name="brand">
                        <option value="{{ $product->brand_id }}" selected>{{ $product->brand->name }}</option>
                    </select>
                    @error('brand')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- ================  Product name ================ --}}
                <div class="mb-3">
                    <label for="product_name" class="form-label">Nama </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="product_name" placeholder="Masukan Nama " name="product_name" value="{{ old('product_name',$product->product_name )}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                       
                </div>
                {{-- =============================  Processor ===============  --}}
                <div class="mb-3">
                    <label for="processor" class="form-label">Processor</label>
                    <input type="text" class="form-control @error('processor') is-invalid @enderror" id="processor" placeholder="Masukan type processor" name="processor" value="{{ old('processor',$product->processor) }}">
                    @error('processor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- =============== CAMERA ====================== --}}
                <div class="mb-3">
                    <label for="camera" class="form-label">Camera</label>
                    <input type="text" class="form-control @error('camera') is-invalid @enderror" id="camera" placeholder="Masukan ukuran camera" name="camera" value="{{ old('camera',$product->camera)}}">
                    @error('camera')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- =========================== BATTERY ========================= --}}
                <div class="mb-3">
                    <label for="battery" class="form-label">Battery</label>
                    <input type="text" class="form-control @error('battery') is-invalid @enderror" id="battery" placeholder="Masukan ukuran battery" name="battery" value="{{old('battery',$product->battery)}}">
                    @error('battery')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- ============================= DISPLAY ============================= --}}
                <div class="mb-3">
                    <label for="display" class="form-label">Display</label>
                    <input type="text" class="form-control @error('display') is-invalid @enderror" id="display" placeholder="Masukan ukuran Layar" name="display" value="{{ old('display',$product->display)}}">
                    @error('display')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- ============================ Storage Ram ========================== --}}
                <div class="mb-3">
                    <label class="form-label @error('storage_ram') is-invalid @enderror">Storage & Ram</label>
                    @foreach ($ramStorage as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$item->name}}" id="{{ $item->name}}" name="storage_ram[]" @if (in_array($item->name,explode(",",$product->storage_ram)))
                            checked
                        @endif>
                        <label class="form-check-label" for="{{ $item->name}}">
                            {{ $item->name }}
                        </label>
                    </div>
                    @endforeach
                    @if (old())
                        @foreach (old('storage_ram') as $item)
                            {{ $item }}
                        @endforeach
                    @endif
                    @error('storage_ram')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div></div>
                    <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </section>
    </div>
    @include('sweet::alert')
@endsection