@extends('backend.admin.layouts.app')

@section('meta_title', 'Product Detail')
@section('page_title', 'Product Detail')
@section('page_title_icon')
    <i class="metismenu-icon pe-7s-users"></i>
@endsection

@section('back')
    <div class="page-title-icon">
        <a href="{{ route('admin.products.index') }}"><i class="fa fa-solid fa-arrow-left"></i></a>
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
                                <th scope="row">Category</th>
                                <td>{{ $product->category->c_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Title</th>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Color</th>
                                <td>{{ $product->color }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Description</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Image</th>
                                <td>
                                    @if(!empty($product->image))
                                        <a href="{{ asset('uploaded_images'). '/' . $product->image }}">{{ $product->image }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
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
            $('#sidebar-product-btn').addClass('mm-active');
        });
    </script>
@endsection
