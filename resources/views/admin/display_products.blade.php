@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Responsive Table</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Descriprtion</th>
                                    <th scope="col">Sex</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td><img width="100" height="100" src={{ $product->image }}
                                                alt={{ $product->name }}></td>
                                        <td>{{ $product->size }}</td>
                                        <td>{{ $product->type }}</td>
                                        <td
                                            style=" max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            {{ $product->description }}</td>
                                        <td>{{ $product->sex }}</td>
                                        <td><button class="btn btn-primary">Edit</button> </td>
                                        <td><button class="btn btn-danger">Delete</button></td>

                                    </tr>
                                @endforeach
<div class="paginating">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->
@endsection
