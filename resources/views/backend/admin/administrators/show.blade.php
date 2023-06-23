@extends('backend.admin.layouts.app')

@section('meta_title', 'Admin Detail')
@section('page_title', 'Admin Detail')
@section('page_title_icon')
    <i class="metismenu-icon pe-7s-users"></i>
@endsection

@section('back')
    <div class="page-title-icon">
        <a href="{{ route('admin.administrators.index') }}"><i class="fa fa-solid fa-arrow-left"></i></a>
    </div>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{ $administrator->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $administrator->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td>{{ $administrator->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">IP</th>
                                <td>{{ $administrator->ip ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">User Agent</th>
                                <td>{{ $administrator->user_agent ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $('#sidebar-admin-btn').addClass('mm-active');
        });
    </script>
@endsection
