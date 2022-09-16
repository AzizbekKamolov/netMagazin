@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card card-indigo">
                        <div class="card-header">
                            <h3 class="card-title">Products create</h3>
                        </div>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="3" id="exampleInputEmail1"  class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="img">Image</label>
                                    <input type="file" class="form-control" id="img" name="img[]" multiple="multiple">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <input type="text" class="form-control" id="size" name="size">
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


@endsection
