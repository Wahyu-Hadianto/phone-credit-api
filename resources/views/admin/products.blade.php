@extends('admin.layouts.app')
@section('title','Daftar Produk')
@push('child-css')
    <link rel="stylesheet" href="{{ asset('css/child-1.css')}}">
@endpush
@section('content')
<div class="row justify-content-center table-responsive">
  <ul class="list-group text-nowrap table-responsive"> 
        <li class="list-group-item ">
          <div class="row">
            <div class="col-1">No</div>
            <div class="col-2">Dibuat</div>
            <div class="col-3">Nama Produk</div>
            <div class="col-3">Merek</div>
            <div class="col-2">Aksi</div>
          </div>
        </li>
    @foreach ($products as $item)
        <li class="list-group-item ">
          <div class="row">
            <div class="col-1">{{ $loop->iteration }}</div>
            <div class="col-2">{{ date('d F Y',strtotime($item->created_at)) }}</div>
            <div class="col-3">{{ $item->brand->name }}</div>
            <div class="col-3">{{ $item->product_name }}</div>
            <div class="col-3">
              <button class="btn btn-info btn-md" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample-{{ $item->id}}" aria-expanded="false" aria-controls="collapseExample">Detail</button>
             <button class="btn btn-danger btn-md" onclick="deleteList(event)">
               Hapus
              <form action="{{url('/product/'.$item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
              </form>
             </button>
          </div>
          <div class="product-detail collapse p-2" id="collapseExample-{{ $item->id }}">
            <div class="p-2">
              <h5 >Spesifikasi</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered bg-light"> 
                <tr>
                  <th>Processor</th>
                  <td colspan="{{ $colspan }}">{{ $item->processor }}</td>
                </tr>
                <tr>
                  <th>Camera</th>
                  <td colspan="{{ $colspan }}">{{ $item->camera }}</td>
                </tr>
                <tr>
                  <th>Battery</th>
                  <td colspan="{{ $colspan }}">{{ $item->battery}}</td>
                </tr>
                <tr>
                  <th>Konfigurasi</th>
                  <td colspan="{{ $colspan }}">{{ $item->storage_ram }}</td>
                </tr>
                <tr>
                  <th>Display</th>
                  <td colspan="{{ $colspan }}">{{ $item->display}}</td>
                </tr>
                <tr>
                  <th>Aksi</th>
                  <td>
                      <a href="{{ url('/product/'.$item->id. '/edit')}}" class="btn btn-warning">Ubah</a>
                  </td>
                </tr>
              </table>
            </div>
                {{-- ========== Price =============== --}}
              <div class="p-2 row">
                <div class="col-1">
                  <h5>Harga</h5>
                </div>
                <div class="col-2">
                  <a href="{{ url('product/price')}}" class="btn btn-primary">
                    Harga Baru
                  </a>
                </div>
              </div>
              <table class="table table-bordered bg-light">
                <tr>
                  <th>Harga Normal</th>
                  @foreach ($item->prices as $price)
                      <td>{{ $price->price_normal}} ({{ $price->ramStorage->name}})</td>
                  @endforeach
                </tr>
                <tr>
                 <th>Harga Promo & Exp Promo</th> 
                 @foreach ($item->prices as $price)
                    <td>
                      @if ($price->price_sale)
                      {{ $price->price_sale}} ({{ $price->expired_sale }})</td>
                      @else
                          -
                      @endif
                @endforeach
                </tr>
                <tr>
                  <th>Aksi</th>
                  @foreach ($item->prices as $price)
                  <td>     
                      <a href="{{ url('/product/'.$price->id.'/price/edit')}}" class="btn btn-warning">Ubah Harga</a>
                  </td>
                  @endforeach
                </tr>
              </table>
               {{--  ========= Image ============= --}}
              <div class="p-2 row">
                <div class="col-1">
                  <h5>Image</h5>
                </div>
                <div class="col-1">
                  <a href="{{ url('product/image')}}" class="btn btn-primary">
                    Image Baru
                  </a>
                </div>
              </div>
                <table class="table table-bordered bg-light">     
                @foreach ($item->images as $image)
                <tr>
                  <th>{{ $image->color_name}}</th>
                  <td colspan="{{ $colspan }}">
                    @foreach ($image->images as $img)
                    <img src="{{ asset('/storage/'.$img->image )}}" style="max-width: 100px">
                    @endforeach
                  </td>
                  <td>
                      <a href="{{ url('/product/'.$image->id. '/image/edit')}}" class="btn btn-warning btn-md">Ubah</a>
                      <button class="btn btn-danger btn-md" onclick="deleteList(event)">
                        Hapus
                       <form action="{{url('/product/image/'.$image->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                       </form>
                  </td>
                </tr>
            @endforeach
                </table>
             </div>
          </div>
        </li>
    @endforeach
  </ul>
</div>
@include('sweet::alert')
@endsection
@push('child-script')
   
@endpush
