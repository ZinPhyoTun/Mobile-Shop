@extends('backend.admin.layouts.app')

@section('meta_title', 'Products')
@section('page_title', 'Products')
@section('products-active', 'mm-active')
@section('page_title_icon')
    <i class="metismenu-icon pe-7s-users"></i>
@endsection

@section('page_title_buttons')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary action-btn"><i class="fa fa-circle-plus"></i>&nbsp;&nbsp;Add Product</a>
    </div>
@endsection

@section('content')
    <h1>Still Developing.....</h1>
@endsection

@section('script')
    <script></script>
    @include('backend.admin.layouts.assets.trash_script')
@endsection
