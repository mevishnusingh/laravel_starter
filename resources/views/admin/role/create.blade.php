@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Role</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active">Add Role</li>
        </ol>
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Role</label>
                <input type="text" class="form-control" placeholder="Role Name" id="name" name="name">
                @if ($errors->has('name'))
                    <span style="color: red">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
@endsection
