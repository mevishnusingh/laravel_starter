@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Merchants</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Merchants</li>
        </ol>
        @include('layouts.flash-message')
        <div class="card mb-4">
            @can('add_merchants')
                <div class="card-header">
                    <div class="pull-left">
                        <a href="{{ route('merchants.create') }}" class="btn btn-primary" style="float: right;">Add Merchants</a>
                    </div>
                </div>
            @endcan
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Name</th>
                            <th>Subdomain</th>
                            <th>Created At</th>
                            @can('edit_merchants', 'delete_merchants')
                                <th class="text-center">Operations</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($result) > 0)
                            @foreach ($result as $merchant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $merchant->name }}</td>
                                    <td>{{ $merchant->subdomain }}</td>
                                    <td>{{ $merchant->created_at->toFormattedDateString() }}</td>
                                    @can('edit_merchants', 'delete_merchants')
                                        <td class="text-center">
                                            @can('edit_merchants')
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('merchants.edit', $merchant->id) }}">Edit</a>
                                                |
                                            @endcan
                                            @can('delete_merchants')
                                                <form class="d-inline" action="{{ route('merchants.destroy', $merchant->id) }}"
                                                    method="Post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
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
