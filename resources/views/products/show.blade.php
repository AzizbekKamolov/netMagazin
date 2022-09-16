@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->

    <section class="content" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <th>Created by</th>
                                    <td>{{ $product->created_by }}</td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td>{{ $product->size }}</td>
                                </tr>
                                <tr>
                                    <th>Photo</th>
                                    <td>
                                        @foreach(json_decode($product->img) as $img)
                                            <img src="{{ asset('storage\files\\'.$img) }}" alt="img" style="max-width: 250px; height:auto">
                                        @endforeach
                                    </td>
                                 </tr>

                            </table>
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
