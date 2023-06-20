@extends('backend.admin.layouts.app')

@section('meta_title', 'Categories')
@section('page_title', 'Categories')
@section('categories-active', 'mm-active')
@section('page_title_icon')
    <i class="metismenu-icon pe-7s-users"></i>
@endsection

@section('page_title_buttons')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary action-btn">Add Category</a>
    </div>
@endsection

@section('content')
    <div class="row container">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-hover dtable">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Code</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            var cat_table = $('.dtable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.categories.all') }}",
                columns: [{
                        data: 'c_name',
                        name: 'c_name',
                    },
                    {
                        data: 'c_code',
                        name: 'c_code',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: `/admin/categories/delete/${id}`,
                    type: 'GET',
                    success: function() {
                        cat_table.ajax.reload();
                    }
                });
            });
        });
    </script>
    @include('backend.admin.layouts.assets.trash_script')
@endsection
