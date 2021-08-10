@extends('backend.layouts.app')

@section('content')

<x-content-wrapper-header :page="$page"></x-content-wrapper-header>

<section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('categories.store') }}" method="POST">
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
                            <label for="slug">Slug :</label>
                            <input class="form-control @error('slug') error @enderror" type="text" id="slug" name="slug"
                                placeholder="Slug ..." value="{{ old('slug') }}">
                        </div>
                        @error('slug')
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
        {{-- Show all Category --}}
        <div class="col-lg-8">
            {{-- Alert Info --}}
            @includeIf('backend.layouts.alert')
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
                                            <table class="table table-bordered table-hover table-responsive table-info text-center">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">STT</th>
                                                        <th width="30%">Name</th>
                                                        <th width="30%">Slug</th>
                                                        <th width="10%">Status</th>
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if(count($categories) == 0)
                                                    <div class=" alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <span>No any categories here !</span>
                                                    </div>
                                                    @else
                                                    @foreach ($categories as $category)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>
                                                            <p>{{ Str::limit($category->name, 15, '...') }}</p>
                                                        </td>
                                                        <td>{{ Str::limit($category->slug, 15, '...') }}</td>
                                                        <td>
                                                            @if($category->status == 1)
                                                            <span class="badge badge-success">Show</span>
                                                            @else
                                                            <span class="badge badge-secondary">Hide</span>
                                                            @endif
                                                        <td>
                                                            <a class="btn btn-info"
                                                                href="categories/{{ $category->id }}/edit"
                                                                role="button"><i class="fas fa-pen"></i></a>
                                                            <form class="d-inline-block"
                                                                action="{{ route('categories.destroy', $category->id ) }}"
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
                                                <p>Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of
                                                    {{$categories->total()}} entries</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="float-right">
                                                {{ $categories->links() }}
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
