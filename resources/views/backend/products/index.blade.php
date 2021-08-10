@extends('backend.layouts.app')

@section('content')

<x-content-wrapper-header :page="$page"></x-content-wrapper-header>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title line-height-40">DataTable Products</h3>
                        <a href="{{ route('products.create') }}" class="btn btn-outline-secondary float-right"><i
                                class="fas fa-plus mr-2"></i>Add New</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @includeIf('backend.layouts.alert')
                                <table class="table table-bordered table-hover table-info text-center">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Info</th>
                                            <th>Image</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(count($products) == 0)
                                        <div class=" alert alert-warning alert-dismissible fade show" role="alert">
                                            <span>No any products here !</span>
                                        </div>
                                        @else
                                        @foreach ($products as $product)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>
                                                <a class="text-dark" href="{{ route('products.show', $product->id) }}">
                                                    Name: {{ $product->name }}
                                                </a>
                                                <p>Category: {{ $product->category->name }}</p>
                                            </td>
                                            <td><img width="150px"
                                                    src="{{ asset("uploads/products/product_avatar/$product->image") }}"
                                                    alt="{{ $product->name }}">
                                            </td>
                                            <td width="15%">
                                                @foreach ($product->productColors as $color)
                                                <label class="btn btn-sm" style="border: 2px solid {{ $color->value }}">
                                                    {{ $color->name }}
                                                </label>
                                                @endforeach
                                            </td>
                                            <td>@foreach ($product->productSizes as $size)
                                                <label class="btn btn-outline-dark btn-sm text-center">
                                                    <span class="text-md">{{ Str::title($size->value) }}</span>
                                                </label>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($product->sale_price > 0)
                                                <p class="text-decoration-line-through">
                                                    <del>{{ number_format($product->price, 2, ',') }}$</del>
                                                </p>
                                                <p>{{ number_format($product->sale_price, 2, ',') }}$</p>
                                                @else
                                                <p>{{ number_format($product->price, 2, ',') }}$</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->status == 1)
                                                <span class="badge badge-success">Show</span>
                                                @else
                                                <span class="badge badge-secondary">Hide</span>
                                                @endif
                                            <td width="15%">
                                                <a class="btn btn-info m-1"
                                                    href="{{ route('products.edit', $product->id) }}" role="button"><i
                                                        class="fas fa-pen"></i></a>
                                                <form class="d-inline-block"
                                                    action="{{ route('products.destroy', $product->id ) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger m-1" type="submit"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info my-2">
                                    <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                                        {{$products->total()}} entries</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="float-right">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('script-option')
<script src="{{ asset('asset-backend/dist/js/slug.js') }}"></script>
@endsection
