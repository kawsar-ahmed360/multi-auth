@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <button type="button" style="width: 130px;" class="btn btn-primary btn-smk" data-toggle="modal"
                        data-target="#exampleModal">
                        Add Product
                    </button>
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (@$list as $key => $lis)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ @$lis->name }}</td>
                                    <td>{{ @$lis->price }}</td>
                                    <td>{{ @$lis->color }}</td>
                                    <td>{{ @$lis->size }}</td>
                                    <td>
                                        <a data-toggle="modal"
                                        data-target="#exampleModaledit{{$lis->id}}" class="btn btn-success btn-sm">edit</a>
                                        <a href="{{route('ProductDelete',$lis->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ProductStore') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                            </div>

                            <div class="col-md-12">
                                <label for="">Color</label>
                                <input type="text" class="form-control" name="color" placeholder="Enter color">
                            </div>

                            <div class="col-md-12">
                                <label for="">Size</label>
                                <input type="text" class="form-control" name="size" placeholder="Enter size">
                            </div>

                            <div class="col-md-12">
                                <label for="">price</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter price">
                            </div>

                            <div class="col-md-12">
                                <label for="">Discount Price</label>
                                <input type="text" class="form-control" name="discount_price"
                                    placeholder="Enter discount_price">
                            </div>

                            <div class="col-md-12">
                                <label for="">Stock</label>
                                <input type="text" class="form-control" name="stock" placeholder="Enter stock">
                            </div>


                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" id="" cols="20" rows="4"></textarea>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    @foreach (@$list as $key => $lis)

    <div class="modal fade" id="exampleModaledit{{@$lis->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ProductUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{@$lis->id}}" name="EditId">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{@$lis->name}}" name="name" placeholder="Enter Name">
                        </div>

                        <div class="col-md-12">
                            <label for="">Color</label>
                            <input type="text" class="form-control" value="{{@$lis->color}}" name="color" placeholder="Enter color">
                        </div>

                        <div class="col-md-12">
                            <label for="">Size</label>
                            <input type="text" class="form-control" value="{{@$lis->size}}" name="size" placeholder="Enter size">
                        </div>

                        <div class="col-md-12">
                            <label for="">price</label>
                            <input type="text" class="form-control" value="{{@$lis->price}}" name="price" placeholder="Enter price">
                        </div>

                        <div class="col-md-12">
                            <label for="">Discount Price</label>
                            <input type="text" class="form-control" value="{{@$lis->discount_price}}" name="discount_price"
                                placeholder="Enter discount_price">
                        </div>

                        <div class="col-md-12">
                            <label for="">Stock</label>
                            <input type="text" class="form-control" value="{{@$lis->stock}}" name="stock" placeholder="Enter stock">
                        </div>


                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" id="" cols="20" rows="4">{!!@$lis->description!!}</textarea>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
    @endforeach
@endsection
