@extends('backend.layouts.app')

@section('content')

<x-content-wrapper-header :page="$page"></x-content-wrapper-header>

<section class="content">
    <div class="row">
        {{-- Add new color --}}
        <div class="col-lg-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title line-height-40">Edit Size</h3>
                    <a href="{{ route('sizes.index') }}" class="btn btn-outline-secondary float-right">
                        <i class="fas fa-plus mr-2"></i>Add New
                    </a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('sizes.update', $sizeUpdate->id ) }}" method="POST">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $sizeUpdate->id }}">
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input class="form-control @error('name') error @enderror" type="text" id="name" name="name"
                                placeholder="Name ..." value="{{ old('name') ?? $sizeUpdate->name }}" autofocus>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="value">Value :</label>
                            <input class="form-control @error('value') error @enderror" type="text" id="value"
                                placeholder="Size ..." name="value" value="{{ old('value') ?? $sizeUpdate->value }}">
                        </div>
                        @error('value')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="status">Status: </label>
                        <select class="form-control" name="status" id="status">
                            <option {{ $sizeUpdate->status == 1 ? 'selected' : '' }} value="1">Show</option>
                            <option {{ $sizeUpdate->status == 0 ? 'selected': '' }} value="0">Hide</option>
                        </select>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button class="btn btn-warning mt-2">
                            Update data !
                        </button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Show all color --}}
        <div class="col-lg-8">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="content">
                            {{-- Alert --}}
                            @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @elseif (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">DataTable Sizes</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover table-info text-center">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Value</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if(count($sizes) == 0)
                                                    <div class=" alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <span>No any colors here !</span>
                                                    </div>
                                                    @else

                                                    @foreach ($sizes as $size)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>
                                                            <label class="btn btn-sm btn-outline-dark text-center">
                                                                <span
                                                                    class="text-sm">{{ Str::upper($size->value) }}</span>
                                                                <br>
                                                                {{ Str::title($size->name) }}
                                                            </label>
                                                        </td>
                                                        <td>
                                                            @if($size->status == 1)
                                                            <span class="badge badge-success">Show</span>
                                                            @else
                                                            <span class="badge badge-secondary">Hide</span>
                                                            @endif
                                                        <td>
                                                            <a class="btn btn-info"
                                                                href="{{ route('sizes.edit', $size->id ) }}"
                                                                role="button"><i class="fas fa-pen"></i></a>
                                                            <form class="d-inline-block"
                                                                action="{{ route('sizes.destroy', $size->id ) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger" type="submit"><i
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
                                                Showing 1 to 10 of 57 entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="float-right">
                                                {{ $sizes->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </section>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
            <!-- /.content -->
        </div>
    </div>
</section>

@endsection

{{-- Convert Slug --}}
@section('script-option')
<script src="{{ asset('asset-backend/dist/js/slug.js') }}"></script>
@endsection
