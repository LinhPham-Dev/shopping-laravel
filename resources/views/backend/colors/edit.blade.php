@extends('backend.layouts.app')

@section('content')

<x-content-wrapper-header :page="$page"></x-content-wrapper-header>

<section class="content">
    <div class="row">
        {{-- Add new color --}}
        <div class="col-lg-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title line-height-40">Edit Color</h3>
                    <a href="{{ route('colors.index') }}" class="btn btn-outline-secondary float-right">
                        <i class="fas fa-plus mr-2"></i>Add New
                    </a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('colors.update', $colorUpdate->id ) }}" method="POST">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $colorUpdate->id }}">
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input class="form-control @error('name') error @enderror" type="text" id="name" name="name"
                                placeholder="Name ..." value="{{ old('name') ?? $colorUpdate->name }}" autofocus>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="value">Value :</label>
                            <input class="form-control @error('value') error @enderror" type="color" id="value"
                                name="value" value="{{ old('value') ?? $colorUpdate->value }}">
                        </div>
                        @error('value')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="status">Status: </label>
                        <select class="form-control" name="status" id="status">
                            <option {{ $colorUpdate->status == 1 ? 'selected' : '' }} value="1">Show</option>
                            <option {{ $colorUpdate->status == 0 ? 'selected': '' }} value="0">Hide</option>
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
                                    <h3 class="card-title">DataTable Colors</h3>
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

                                                    @if(count($colors) == 0)
                                                    <div class=" alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <span>No any colors here !</span>
                                                    </div>
                                                    @else

                                                    @foreach ($colors as $color)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>
                                                            <label class="btn btn-outline-dark btn-sm text-center">
                                                                {{ $color->name }}
                                                                <br>
                                                                <i class="fas fa-circle fa-2x"
                                                                    style="color: {{ $color->value }}; border: 2px solid black; border-radius: 50%; padding: 1px"></i>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            @if($color->status == 1)
                                                            <span class="badge badge-success">Show</span>
                                                            @else
                                                            <span class="badge badge-secondary">Hide</span>
                                                            @endif
                                                        <td>
                                                            <a class="btn btn-info"
                                                                href="{{ route('colors.edit', $color->id ) }}"
                                                                role="button"><i class="fas fa-pen"></i></a>
                                                            <form class="d-inline-block"
                                                                action="{{ route('colors.destroy', $color->id ) }}"
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
                                                {{ $colors->links() }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./pagination -->
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
