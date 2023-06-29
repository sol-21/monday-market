@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Vertical Form</div>
                    <hr>
                    <form method="POST" action="{{ route('products.update', ['id' => $product->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="input-1">Name</label>
                            <input type="text" class="form-control" name="name" id="input-1"
                                placeholder="Enter Product Name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="input-2">sex</label>
                            <input type="text" class="form-control" name="sex" id="input-2"
                                placeholder="Enter Product Sex" value="{{ $product->sex }}">
                        </div>
                        <div class="form-group">
                            <label for="input-3">size</label>
                            <input type="text" class="form-control" name="size" id="input-3"
                                placeholder="Enter Product Size" value="{{ $product->size }}">
                        </div>
                        <div class="form-group">
                            <label for="input-4">Price</label>
                            <input type="number" class="form-control" name="price" id="input-4"
                                placeholder="Enter Product Price" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="input-5">Color</label>
                            <input type="text" class="form-control" name="color" id="input-5"
                                placeholder="Enter Product Color" value="{{ $product->color }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" >{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="input-5">type</label>
                            <input type="text" class="form-control" name="type" id="input-7"
                                placeholder="Enter Product type" value="{{ $product->type }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <input id="image" type="file" name="image" class="form-control-file" id="input-7"
                                accept="image/*" placeholder="Enter Product Image" value="{{ $product->image }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i>Edit Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->
@endsection
