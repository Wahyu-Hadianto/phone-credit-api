@extends('admin.layouts.app')
@section('title','Spesifikasi')
@section('content')
        <div class="row justify-content-center">
            <section class="bg-light p-3 mb-4">
                <form action="{{ url('/spesifikasi')}}" method="post">
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
                        <label for="processor" class="form-label">Seri</label>
                        <select class="form-select" aria-label="Default select example" required name="select_seri" disabled>
                            <option selected disabled>Pilih Seri</option>  
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="processor" class="form-label">Processor</label>
                        <input type="text" class="form-control" id="processor" placeholder="Masukan type processor" name="processor">
                    </div>
                    <div class="mb-3">
                        <label for="camera" class="form-label">Camera</label>
                        <input type="text" class="form-control" id="camera" placeholder="Masukan ukuran camera" name="camera">
                    </div>
                    <div class="mb-3">
                        <label for="battery" class="form-label">Battery</label>
                        <input type="text" class="form-control" id="battery" placeholder="Masukan ukuran battery" name="battery">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Storage & Ram</label>
                        @foreach ($ramStorage as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$item->name}}" id="{{ $item->name}}" name="storage_ram[]">
                            <label class="form-check-label" for="{{ $item->name}}">
                                {{ $item->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
            <section class="bg-light p-3 mb-3" >
                <h5>Daftar Seri Product</h5>
                <div>
                 <table class="table table-hover ">
                     <thead>
                         <th class="col-1">No</th>
                         <th>Seri</th>
                         <th>Processor</th>
                         <th>Camera</th>
                         <th>Battery</th>
                         <th>Ram & Storage</th>
                         <th>Aksi</th>
                     </thead>
                     <tbody>
                         @foreach ($listSpesifikasi as $item)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $item->seri->name }}</td>
                             <td>{{ $item->processor }}</td>
                             <td>{{ $item->camera }}</td>
                             <td>{{ $item->battery }}</td>
                             <td>{{ $item->storage_ram }}</td>
                             <td class="text-center">
                                 <span class="badge bg-warning text-dark pointer">Edit</span> | 
                                     <span class="badge bg-danger pointer" onclick="deleteList(event)">
                                         <form action="{{ url('/seri/' .$item->id) }}" method="post">
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
             </section>   
        </div>
@endsection