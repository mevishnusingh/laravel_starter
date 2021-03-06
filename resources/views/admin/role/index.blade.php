@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Roles</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
        @include('layouts.flash-message')
        <div class="card mb-4">
            @can('add_roles')
                <div class="card-header">
                    <div class="pull-left">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary" style="float: right;">Add Roles</a>
                    </div>
                </div>
            @endcan
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Tasks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($result) > 0)
                            @foreach ($result as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->created_at->toFormattedDateString() }}</td>
                                    <td><a href="{{ route('roles.permissions') }}#{{ $role->name }}">Show</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
