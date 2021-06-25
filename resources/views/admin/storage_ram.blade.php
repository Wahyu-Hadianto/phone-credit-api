@extends('admin.layouts.app')
@section('title','Ram Storage')
@section('content')
    <div class="storage-ram row justify-content-center">
        <section class="bg-light p-3 col-8 mb-4">
            <form action="{{ url('storage-ram') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="storage_ram" class="form-label">Ram & Storage</label>
                    <input type="text" class="form-control" id="storage_ram" placeholder="Masukan ukuran storage & ram " name="storage_ram" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </section>
        {{-- ============ DAFTAR RAM STORAGE ==============  --}}
        <section class="bg-light p-2 mb-3 col-8" >
            <h5>Daftar Storage Ram</h5>
            <div>
             <table class="table table-hover ">
                 <thead>
                     <th class="col-1">No</th>
                     <th>Name</th>
                     <th class="text-center">Aksi</th>
                 </thead>
                 <tbody>
                     @foreach ($ramStorage as $item)
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $item->name }}</td>
                         <td class="text-center">
                             <button class="btn btn-warning btn-sm text-dark pointer" disabled>Edit</button> | 
                                 <span class="btn btn-danger btn-sm pointer" onclick="deleteList(event)">
                                     <form action="{{ url('/storage-ram/' .$item->id) }}" method="post">
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
    @include('sweet::alert')
@endsection