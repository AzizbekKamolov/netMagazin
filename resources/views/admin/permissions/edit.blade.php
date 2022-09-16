@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card card-indigo">
                        <div class="card-header">
                            <h3 class="card-title">Permission edit</h3>
                        </div>
                        <form action="{{ route('permission.update', ['permission' => $permission->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Permission name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $permission->name }}">
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
