@extends('backend.dashboard.layouts.app', ['activePage' => 'users', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header row">
                            <div class="col-md-6">
                            <h4 class="card-title">Users</h4>
                            <p class="card-category">Manage users</p>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('backend.users.create') }}" class="btn btn-info pull-right"> Add User </a>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped col-md-12">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
@endsection

@section('js_content')
<script>
    $(function() {
        
        $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('backend.users.get') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'is_admin', name: 'is_admin' },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection