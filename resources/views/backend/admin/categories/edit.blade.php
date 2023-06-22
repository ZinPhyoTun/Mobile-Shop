@extends('backend.admin.layouts.app')

@section('meta_title', 'Edit Category')
@section('page_title', 'Update Category')
@section('page_title_icon')
    <i class="metismenu-icon pe-7s-users"></i>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('c_name') is-invalid @enderror"
                                    name="c_name" value="{{ old('c_name') ?? $category->c_name }}" required>

                                @error('c_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Category Code') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('c_code') is-invalid @enderror"
                                    name="c_code" value="{{ old('c_code') ?? $category->c_code }}" required>

                                @error('c_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-circle-up"></i>
                                    {{ __('Update Category') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $('#sidebar-category-btn').addClass('mm-active');
        });
    </script>
@endsection
