@extends('backend.admin.layouts.app')

@section('meta_title', 'User Detail')
@section('page_title', 'User Detail')
@section('page_title_icon')
    <i class="metismenu-icon pe-7s-users"></i>
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
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $user->email }}</td>
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
            $('#sidebar-user-btn').addClass('mm-active');
        });
    </script>
@endsection
