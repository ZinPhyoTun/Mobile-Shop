@extends('backend.admin.layouts.app')

@section('meta_title', 'Edit Product')
@section('page_title', 'Update Product')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select class="form-control custom-select @error('category_code') is-invalid @enderror" name="category_code" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->c_code }}" @if($category->c_code == old('category_code')) selected @elseif($category->c_code == $product->category_code) selected @endif >{{ $category->c_name }}</option>
                                    @endforeach
                                </select>

                                @error('category_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') ?? $product->title }}" required autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Color') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('color') is-invalid @enderror"
                                    name="color" value="{{ old('color') ?? $product->color }}" placeholder="eg. Black, White, Blue" required>

                                @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="img" class="@error('image') is-invalid @enderror" name="image" accept=".png, .jpg, .jpeg" @if(empty($product->image)) required @endif>
                                <input type="hidden" name="old_image_name" value="{{ $product->image }}">
                                <span class="text-info">
                                    @if(!empty($product->image))
                                        [{{ $product->image }}]
                                    @else
                                        [Empty file in database]
                                    @endif
                                </span>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for=""
                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30"
                                    rows="4" required>{{ old('description') ?? $product->description }}</textarea>

                                @error('description')
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
                                    {{ __('Update Product') }}
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
            $('#sidebar-product-btn').addClass('mm-active');
        });
    </script>
@endsection
