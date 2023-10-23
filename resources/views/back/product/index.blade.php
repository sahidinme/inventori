@extends('back.layout.template')

@section('title', 'Produk - admin')


@section('content')
    

    {{-- conten --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product</h1>
      </div>

        <div class="mt-3">
            <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button>
            
            {{-- Alert failed --}}
            @if ($errors->any())
            <div class="my-3">
                
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
            @endif

            {{-- Alert success --}}
            @if (session('success'))
            <div class="my-3">         
                <div class="alert alert-success">
                    {{ session('success') }}
                </div> 
            </div>
            @endif

            <table class="table table-striped table-bordered" id="dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Create At</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($product as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->Categories->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>0</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $item->id }}">Edit</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal create -->
    @include('back.product.create-modal')

     <!-- Modal update -->
    @include('back.product.update-modal')

    <!-- Modal update -->
    @include('back.product.delete-modal')


@endsection