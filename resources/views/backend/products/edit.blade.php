@extends('backend.layouts.app')

@section('content')

<x-content-wrapper-header :page="$page"></x-content-wrapper-header>

<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Product {{ $productEdit->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('products.update', $productEdit->id ) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 px-3">
                                {{-- Id --}}
                                <input type="hidden" value="{{ $productEdit->id }}" name="id">
                                {{-- Name --}}
                                <div class="form-group">
                                    <label for="name">Name :</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        id="name" name="name" placeholder="Name ..."
                                        value="{{ old('name') ?? $productEdit->name }}" autofocus>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Slug --}}
                                <div class="form-group">
                                    <label for="slug">Slug :</label>
                                    <input class="form-control @error('slug') is-invalid @enderror" type="text"
                                        id="slug" name="slug" placeholder="Slug ..."
                                        value="{{ old('slug') ?? $productEdit->slug }}">
                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Image --}}
                                <div class="form-group">
                                    <label for="product_avatar">Choose Image :</label>
                                    <input class="form-control-file" type="file" id="product_avatar"
                                        name="product_avatar">
                                    @error('product_avatar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="image-show w-75 mt-4">
                                        <img class="w-50"
                                            src="{{ asset('uploads/products/product_avatar/'. $productEdit->image) }}"
                                            alt="{{ $productEdit->image }}">
                                    </div>
                                </div>
                                {{-- Color --}}
                                <div class="my-3">
                                    <div class="form-group">
                                        <label for="color">Choose Color :</label>
                                        <div class="flex-item d-lg-flex mt-1">
                                            {{-- All Colors --}}
                                            @foreach ($colors as $color)
                                            <div class="custom-control custom-checkbox mr-3">
                                                {{-- Check Colors Exist --}}
                                                @php
                                                $checked = in_array($color->id, $colors_exits) ?
                                                'checked' : ''
                                                @endphp
                                                <input class="custom-control-input" name="color[]" type="checkbox"
                                                    id="color-{{ $color->id }}" value="{{ $color->id }}" {{ $checked }}>
                                                <label for="color-{{ $color->id }}"
                                                    class="custom-control-label text-center">
                                                    <i class="fas fa-circle mx-1 border-color"
                                                        style="color: {{ $color->value }}"></i>
                                                    {{ $color->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @error('color')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Size --}}
                                <div class="my-3">
                                    <div class="form-group">
                                        <label for="color">Choose Size :</label>
                                        <div class="flex-item d-lg-flex mt-1">
                                            @foreach ($sizes as $size)
                                            <div class="custom-control custom-checkbox mr-4">
                                                {{-- Check Sizes Exist --}}
                                                @php
                                                $checked = in_array($size->id, $sizes_exits) ?
                                                'checked' : '';
                                                @endphp
                                                <input class="custom-control-input" name="size[]" type="checkbox"
                                                    id="size-{{ $size->id }}" value="{{ $size->id }}" {{ $checked }}>
                                                <label for="size-{{ $size->id }}"
                                                    class="custom-control-label">{{ Str::title($size->name) }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @error('size')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 px-3">
                                {{-- Price --}}
                                <div class="form-group">
                                    <label for="price">Price :</label>
                                    <input class="form-control @error('price') is-invalid @enderror" type="number"
                                        id="price" name="price" placeholder="Price ..."
                                        value="{{ old('price') ?? $productEdit->price }}">
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Sale Price --}}
                                <div class="form-group">
                                    <label for="sale_price">Sale Price :</label>
                                    <input class="form-control @error('sale_price') is-invalid @enderror" type="text"
                                        id="sale_price" name="sale_price" placeholder="Sale Price ..."
                                        value="{{ old('price') ?? $productEdit->sale_price }}">
                                    @error('sale_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Image Detail --}}
                                <div class="form-group">
                                    <label for="image_details">Choose Image Detail :</label>
                                    <input class="form-control-file" type="file" id="image_details"
                                        name="image_details[]" multiple>
                                    @error('image_details')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="image-detail d-md-flex my-4">
                                        @foreach ($productEdit->productImages as $imageDetail)
                                        <div class="image-item my-3">
                                            <img class="w-75"
                                                src="{{ asset('uploads/products/product_details/'. $imageDetail->image_name) }}"
                                                alt="{{ $imageDetail->image_name }}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- Category --}}
                                <div class="form-group">
                                    <label for="category">Category: </label>
                                    <select class="form-control" name="category_id" id="category">
                                        @foreach ($categories as $category)
                                        <option {{ $productEdit->category_id == $category->id ? 'selected': '' }}
                                            value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Status --}}
                                <div class="form-group">
                                    <label for="status">Status: </label>
                                    <select class="form-control" name="status" id="status">
                                        <option {{ $productEdit->status == 1 ? 'selected': '' }} value="1">Show</option>
                                        <option {{ $productEdit->status == 0 ? 'selected': '' }} value="0">Hide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <label>Description: </label>
                                <textarea name="description" id="summernote">Describe your product...</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-lg mt-2">
                            Update Product !
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script-option')
<!-- Compiled Slug -->
<script src="{{ asset('asset-backend/dist/js/slug.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('asset-backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
    $('#summernote').summernote({
    height: 150,
    minHeight: 100,
    maxHeight: 300,
    });
</script>
@stop
