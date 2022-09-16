@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product edit</h3>
                        </div>
                        <form action="{{ route('product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                           <div class="row">
                               <div class="card-body col-6">
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Product name</label>
                                       <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$product->name}}">
                                   </div>
                               </div>
                               <div class="card-body col-6">
                                   <div class="form-group">
                                       <label for="description">Description</label>
                                       <textarea name="description" id="description" cols="30" rows="3" id="exampleInputEmail1"  class="form-control">{{ $product->description }}</textarea>
                                   </div>
                               </div>
                               <div class="card-body col-6">
                                   <div class="form-group">
                                       <label for="price">Price</label>
                                       <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
                                   </div>
                               </div>
                               <div class="card-body col-6">
                                   <div class="form-group">
                                       <label for="size">Size</label>
                                       <input type="text" class="form-control" id="size" name="size" value="{{ $product->size }}">
                                   </div>
                               </div>
                               <div class="card-body col-12">

                                   <div class="form-group">
                                       <label for="img">Image</label>
                                       <input type="file" class="form-control" id="img" name="img[]" multiple="multiple">
                                   </div>
                               </div>

                               <!-- /.card-body -->

                           </div>

                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <div class="card-body">
                            <label for="img">Delete photo</label>
                            <br>
                            Click to delete the image
                            <hr>
                            @foreach(json_decode($product->img) as $img)
                                <button class="imgh ml-2" value="{{ $img }}"><img src="{{ asset('storage\files\\'.$img) }}" alt="img" style="max-width: 150px; height:auto"></button>
                            @endforeach
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.imgh').click(function (){
                let img = this.value;
                let id = {{ $product->id }}
                const data = [id, img];

                $.ajax({
            url: '{{ route('product.photo.delete') }}',
            type: 'POST',
            data: {photo: data, _token: '{{csrf_token()}}' },
            success: function (data){
                location.reload();
                console.log(data);
            },
            error: function(data) {
              console.log(data);
            }
            });
            });

        })
    </script>
@endsection

