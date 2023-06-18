@extends('backend.admin.layouts.app')

@section('meta_title', 'Users')
@section('page_title', 'Users')
@section('users-active', 'mm-active')
@section('page_title_icon')
    <i class="metismenu-icon pe-7s-users"></i>
@endsection

@section('page_title_buttons')
    <div class="d-flex justify-content-end">
        <a href="#" class="btn btn-primary action-btn">Add Users</a>
    </div>
@endsection

@section('content')
    <h1>Still Developing.....</h1>
@endsection

@section('script')
    <script></script>
    @include('backend.admin.layouts.assets.trash_script')
@endsection
