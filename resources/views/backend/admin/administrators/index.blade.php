@extends('backend.admin.layouts.app')

@section('meta_title', 'Administrators')
@section('page_title', 'Administrators')
@section('administrators-active', 'mm-active')
@section('page_title_icon')
    <i class="metismenu-icon pe-7s-users"></i>
@endsection

@section('page_title_buttons')
    <div class="d-flex justify-content-end">
        <a href="{{ url('admin/administrators/create') }}" class="btn btn-primary"><i
                class="fa fa-circle-plus"></i>&nbsp;&nbsp;Add Administrator</a>
    </div>
@endsection

@section('content')
    <div class="row container">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    @if (session('create_message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('create_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session('update_message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('update_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-hover dtable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
            var table = $('.dtable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.administrators.all') }}",
                columns: [{
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
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
                    url: `/admin/administrators/delete/${id}`,
                    type: 'GET',
                    success: function() {
                        table.ajax.reload();
                    }
                });
            });
        });
    </script>
    @include('backend.admin.layouts.assets.trash_script')
@endsection
