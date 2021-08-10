@extends('backend.layouts.app')

@section('content')

<x-content-wrapper-header :page="$page"></x-content-wrapper-header>

<section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new size</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('sizes.store') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input class="form-control @error('name') error @enderror" type="text" id="name" name="name"
                                placeholder="Name ..." value="{{ old('name') }}" autofocus>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="value">Value :</label>
                            <input class="form-control @error('value') error @enderror" type="text" id="value"
                                placeholder="Size ..." name="value" value="{{ old('value') }}">
                        </div>
                        @error('value')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="status">Status: </label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button class="btn btn-success mt-2">
                            Add new !
                        </button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Show all size --}}
        <div class="col-lg-8">
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

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">DataTable Categoris</h3>
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
                                                        <span>No any sizes here !</span>
                                                    </div>
                                                    @else
                                                    @foreach ($sizes as $size)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>
                                                            <label class="btn btn-sm btn-outline-dark text-center">
                                                                <span
                                                                    class="text-md">{{ Str::upper($size->value) }}</span>
                                                                <br>
                                                                {{ Str::ucfirst($size->name) }}
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
                                                <p>Showing {{ $sizes->firstItem() }} to {{ $sizes->lastItem() }} of
                                                    {{$sizes->total()}} entries</p>
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
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
</section>

@endsection

@section('script-option')
<script src="{{ asset('asset-backend/dist/js/slug.js') }}"></script>
@endsection
