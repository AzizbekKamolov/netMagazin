@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>
                            </span>
                            <a href="{{ route('product.create') }}" class="ml-2"><i class="nav-icon fas fa-plus"></i></a>
                        </div>
                        <!-- /.card-header -->
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Created by</th>
                                    <th>Photo</th>
                                    <th>Tools</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->created_by }}</td>
                                        <td>
                                            @foreach(json_decode($product->img, true) as $img)
                                                <img src="{{ asset('storage\files\\'.$img) }}" alt="img" style="width: 60px">
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{ route('product.delete', ['product' => $product->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-outline-light"><i class="nav-icon fas fa-eye"></i></a>
                                                <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-outline-info"><i class="nav-icon fas fa-pen"></i></a>
                                               <button class="btn btn-outline-danger"><i class="nav-icon fas fa-trash"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
