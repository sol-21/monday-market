@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Vertical Form</div>
                    <hr>
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="input-1">Name</label>
                            <input type="text" class="form-control" name="name" id="input-1"
                                placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label for="input-2">sex</label>
                            <input type="text" class="form-control" name="sex" id="input-2"
                                placeholder="Enter Your Email Address">
                        </div>
                        <div class="form-group">
                            <label for="input-3">size</label>
                            <input type="text" class="form-control" name="size" id="input-3"
                                placeholder="Enter Your Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="input-4">Price</label>
                            <input type="number" class="form-control" name="price" id="input-4"
                                placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="input-5">Color</label>
                            <input type="text" class="form-control" name="color" id="input-5"
                                placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="input-5">type</label>
                            <input type="text" class="form-control" name="type" id="input-7"
                                placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <input id="image" type="file" name="image" class="form-control-file" id="input-7"
                                accept="image/*">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!--End Row-->
@endsection
