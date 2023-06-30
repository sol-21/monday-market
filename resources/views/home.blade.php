@extends('layouts.app')

<!--Start Dashboard Content-->
@section('content')
    <div class="card mt-3">
        <div class="card-content">
            <div class="row row-group m-0">
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">
                            {{ $productCount }}
                            <span class="float-right"><i class="fa fa-shopping-cart"></i></span>
                        </h5>
                        <div class="progress my-3" style="height: 3px">
                            <div class="progress-bar" style="width: 55%"></div>
                        </div>
                        <p class="mb-0 text-white small-font">
                            Total Products

                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">
                            {{ $trousersCount }}
                            <span class="float-right"><i class="fa fa-car"></i></span>
                        </h5>
                        <div class="progress my-3" style="height: 3px">
                            <div class="progress-bar" style="width: 55%"></div>
                        </div>
                        <p class="mb-0 text-white small-font">
                            Total Trousers

                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">
                            {{ $shirtsCount }}
                            <span class="float-right"><i class="fa fa-shirt"></i></span>
                        </h5>
                        <div class="progress my-3" style="height: 3px">
                            <div class="progress-bar" style="width: 55%"></div>
                        </div>
                        <p class="mb-0 text-white small-font">
                            Total shirts

                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">
                            {{ $jacketsCount }}
                            <span class="float-right"><i class="fa fa-jacket"></i></span>
                        </h5>
                        <div class="progress my-3" style="height: 3px">
                            <div class="progress-bar" style="width: 55%"></div>
                        </div>
                        <p class="mb-0 text-white small-font">
                            Total Jackets

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                @foreach ($productsPaginate as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td><img src="{{ asset($product->image) }}" alt="IMG-PRODUCT" width='100' height='100'></td>
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
                                    {!! $productsPaginate->withQueryString()->links('pagination::bootstrap-5') !!}
                                </div>
                            </tbody>

                        </table>



                    </div>
                </div>
            </div>

        </div>
    </div>





    <!--End Dashboard Content-->
@endsection
