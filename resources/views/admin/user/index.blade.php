@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="pull-left">
                    <a href="{{ route('users.create') }}" class="btn btn-primary" style="float: right;">Add Users</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            @can('edit_users', 'delete_users')
                                <th class="text-center">Operations</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($result) > 0)
                            @foreach ($result as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->implode('name', ', ') }}</td>
                                    <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                    @can('edit_users', 'delete_users')
                                        <td class="text-center">
                                            @can('edit_users')
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('users.show', $user->id) }}">Edit</a>
                                                |
                                            @endcan
                                            @can('delete_users')
                                                <a class="btn btn-sm btn-danger"
                                                    href="{{ route('users.destroy', $user->id) }}">Delete</a>
                                            @endcan
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
