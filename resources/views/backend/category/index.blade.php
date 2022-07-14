@extends('backend.layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Categories</h1>
        <div class="card">
            <div class="card-header">
                <a href="{{ route('category.create') }}" class="btn btn-primary float-right">Add
                    Category</a>
            </div>
            <div class="card-body">

                @if ($success = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $success }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20">ID</th>
                                <th width="150">Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td width="20">ID</td>
                                <td width="150">Image</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td scope="row">{{ $category->id }}</td>
                                    <td><img src="{{ asset('images/' . $category->image) }}" alt=""
                                            width="150" /></td>
                                    <td>{{ $category->title }}</td>
                                    <td>{!! nl2br($category->detail) !!}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ url('admin/category/' . $category->id . '/edit') }}">Update</a>
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');"
                                            href="{{ url('admin/category/' . $category->id . '/delete') }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
