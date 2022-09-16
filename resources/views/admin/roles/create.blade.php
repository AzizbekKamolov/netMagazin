@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card card-indigo">
                        <div class="card-header">
                            <h3 class="card-title">Role create</h3>
                        </div>
                        <form action="{{ route('role.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                                </div>

                                <div class="form-group">
                                    <label>Permissions</label>

                                    <select class="duallistbox" multiple="multiple" style="display: none;" name="permission[]">
                                        @foreach($permissions as $permission)
                                            <option>{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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

