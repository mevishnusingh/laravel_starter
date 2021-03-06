@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Permissions</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permissions</li>
        </ol>
        @include('layouts.flash-message')
        <div class="card mb-4">
            @can('add_permissions')
                <div class="card-header">
                    <div class="pull-left">
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary" style="float: right;">Add
                            Permissions</a>
                    </div>
                </div>
            @endcan
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Permission</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($result) > 0)
                            @foreach ($result as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->created_at->toFormattedDateString() }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
