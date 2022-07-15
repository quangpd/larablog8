@extends('backend.layouts.main')
@section('title', 'Settings')
@section('meta_description', 'Settings')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Settings</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{url('admin/setting')}}" method="post">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th width="180">Comment Auto Approve</th>
                    <td>
                        <input type="text" name="comment_auto" id="comment_auto" class="form-control" @if (isset($setting)) value="{{$setting->comment_auto}}" @endif>
                    </td>
                </tr>
                <tr>
                    <th>User Auto Approve</th>
                    <td>
                        <input type="text" name="user_auto" id="user_auto" class="form-control"@if (isset($setting)) value="{{$setting->user_auto}}" @endif/>
                    </td>
                </tr>
                <tr>
                    <th>Recent Post Limit</th>
                    <td>
                        <input type="text" name="recent_post" id="recent_post" class="form-control"@if (isset($setting)) value="{{$setting->recent_post}}" @endif/>
                    </td>
                </tr>
                <tr>
                    <th>Popular Post Limit</th>
                    <td>
                        <input type="text" name="popular_post" id="popular_post" class="form-control"@if (isset($setting)) value="{{$setting->popular_post}}" @endif/>
                    </td>
                </tr>
                <tr>
                    <th>Comment Display Limit</th>
                    <td>
                        <input type="text" name="recent_comment" id="recent_comment" class="form-control"@if (isset($setting)) value="{{$setting->recent_comment}}" @endif/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection
