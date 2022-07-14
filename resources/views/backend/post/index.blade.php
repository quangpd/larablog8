@extends('backend.layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Posts</h1>
        <div class="card">
            <div class="card-header">
                <a href="{{ route('post.create') }}" class="btn btn-primary float-right">Add post</a>
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
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td width="20">ID</td>
                                <td width="150">Image</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Author</td>
                                <td>Action</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $post)
                                <tr>
                                    <td scope="row">{{ $post->id }}</td>
                                    <td><img src="{{ asset('images/' . $post->image) }}" alt="" width="150" />
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! nl2br($post->detail) !!}</td>
                                    <td>{{ $post->user_id }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ url('admin/post/' . $post->id . '/edit') }}">Update</a>
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');"
                                            href="{{ url('admin/post/' . $post->id . '/delete') }}">Delete</a>
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
