@extends('admin.layouts.app')
@section('title','Merek')
@section('content')
  
   <div class="row justify-content-center">
    {{--  =====================  Form add Brand ==============  --}}
    <section class="bg-light p-3 mb-3 col-8">
        <h5>Tambah Merek</h5>
        @include('sweet::alert')
        <form action="{{ url('/brand')}}" method="POST">
            @csrf
            <div class="mb-3 row">
                <div class="col-6">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add Brand Name" name="name_name" required>
                </div>
                <div class="col-2"> 
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </section>
    {{--  =====================  DAFTAR BRAND ==============  --}}

    <section class="bg-light p-2 mb-3 col-8" >
       <h5>Daftar Merek</h5>
       <div>
        <table class="table table-hover ">
            <thead>
                <th class="col-1">No</th>
                <th>Name</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody>
                @foreach ($brands as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-sm text-dark pointer" disabled>
                            Edit
                        </button> 
                        | 
                        <button type="button" class="btn btn-danger pointer btn-sm" onclick="deleteList(event)">
                                <form action="{{ url('/brand/' .$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                 Hapus
                            </button>
                    </td>
                </tr>    
                @endforeach 
            </tbody>
        </table>
       </div>
    </section>    
   </div>
@endsection
@push('child-script')
    <script>
        console.log('child_script')
    </script>
@endpush