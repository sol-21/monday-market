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
                                @foreach ($searchProducts as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td><img src="{{ asset($product->image) }}" alt="IMG-PRODUCT" width='100' height='100' ></td>
                                        <td>{{ $product->size }}</td>
                                        <td>{{ $product->type }}</td>
                                        <td>
                                            <p
                                                style="width: 200px;
                                                white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;">
                                                {{ $product->description }}</p>
                                        </td>
                                        <td>{{ $product->sex }}</td>
                                        <td><button class="btn btn-primary"><a
                                                    href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a></button>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#confirmDeleteModal">Delete</button>
                                         {{-- delete conformation modal --}}
                                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body ">
                                                    <p class="text-dark">Are you sure you want to delete this product?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </td>

                                    </tr>
                                      
                                @endforeach
                            <div class="paginating">
                            {!! $searchProducts->withQueryString()->links('pagination::bootstrap-5') !!}
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
