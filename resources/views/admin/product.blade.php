@extends('admin.layouts.app')
@section('title','Produk')
@section('content')
    <div class="row justify-content-center">
        {{-- =========== FORM TAMBAH SERI ===============  --}}
        <section class="col-8 bg-light p-3 mb-4">
            <div class="mb-3">
                <h3>Tambah Product</h3>
            </div>
            <form action="{{ url('/product')}}" method="POST">
                @csrf
                {{-- ============== BRAND =============== --}}
                <div class="mb-3">
                    <select class="form-select @error('brand') is-invalid @enderror" aria-label="Default select example" name="brand">
                        <option selected disabled>Pilih Brand Produk</option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
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
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="product_name" placeholder="Masukan Nama " name="product_name" value="{{ old('product_name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                       
                </div>
                {{-- =============================  Processor ===============  --}}
                <div class="mb-3">
                    <label for="processor" class="form-label">Processor</label>
                    <input type="text" class="form-control @error('processor') is-invalid @enderror" id="processor" placeholder="Masukan type processor" name="processor" value="{{ old('processor')}}">
                    @error('processor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- =============== CAMERA ====================== --}}
                <div class="mb-3">
                    <label for="camera" class="form-label">Camera</label>
                    <input type="text" class="form-control @error('camera') is-invalid @enderror" id="camera" placeholder="Masukan ukuran camera" name="camera" value="{{ old('camera')}}">
                    @error('camera')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- =========================== BATTERY ========================= --}}
                <div class="mb-3">
                    <label for="battery" class="form-label">Battery</label>
                    <input type="text" class="form-control @error('battery') is-invalid @enderror" id="battery" placeholder="Masukan ukuran battery" name="battery" value="{{old('battery')}}">
                    @error('battery')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- ============================= DISPLAY ============================= --}}
                <div class="mb-3">
                    <label for="display" class="form-label">Display</label>
                    <input type="text" class="form-control @error('display') is-invalid @enderror" id="display" placeholder="Masukan ukuran Layar" name="display" value="{{ old('display')}}">
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
                        <input class="form-check-input" type="checkbox" value="{{$item->name}}" id="{{ $item->name}}" name="storage_ram[]">
                        <label class="form-check-label" for="{{ $item->name}}">
                            {{ $item->name }}
                        </label>
                    </div>
                    @endforeach
                    @error('storage_ram')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </section>
        {{-- =========== DAFTAR SERIES PRODUCT
        <section class="bg-light p-3 mb-3">
            <h5>Daftar Seri Product</h5>
            <div class="table-responsive overflow-auto">
             <table class="table table-hover">
                 <thead>
                     <th class="col-1">No</th>
                     <th>Brand</th>
                     <th>Name</th>
                     <th>Slug</th>
                     <th>Processor</th>
                     <th>Camera</th>
                     <th>Battery</th>
                     <th>Display</th>
                     <th>Ram & Storage</th>
                     <th class="text-center">Aksi</th>
                 </thead>
                 <tbody>
                     @foreach ($products as $item)
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $item->brand_id}}</td>
                         <td>{{ $item->product_name }}</td>
                         <td>{{ $item->slug }}</td>
                         <td>{{ $item->processor }}</td>
                         <td>{{ $item->camera }}</td>
                         <td>{{ $item->battery }}</td>
                         <td>{{ $item->display }}</td>
                         <td>{{ $item->storage_ram }}</td>
                         <td class="text-center">
                             <span class="badge bg-warning text-dark pointer">Edit</span> | 
                                 <span class="badge bg-danger pointer" onclick="deleteList(event)">
                                     <form action="{{ url('/product/' .$item->id) }}" method="post">
                                         @csrf
                                         @method('DELETE')
                                     </form>
                                  Hapus
                                 </span>
                         </td>
                     </tr>    
                     @endforeach 
                 </tbody>
             </table>
            </div>
         </section>    --}}
    </div>
    @include('sweet::alert')
@endsection