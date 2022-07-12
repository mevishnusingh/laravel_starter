@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">users</a></li>
            <li class="breadcrumb-item active">Add User</li>
        </ol>
        @include('layouts.flash-message')
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="User Name" id="name" name="name">
                @if ($errors->has('name'))
                    <span style="color: red">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" placeholder="User email" id="email" name="email">
                @if ($errors->has('email'))
                    <span style="color: red">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" placeholder="User password" id="password" name="password">
                @if ($errors->has('password'))
                    <span style="color: red">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="roles" class="form-label">Roles</label>
                <select name="roles[]" id="roles" class="form-control" multiple>
                    @foreach ($roles as $role_id => $role)
                        <option value="{{ $role_id }}">{{ $role }}</option>
                    @endforeach
                </select>
                @if ($errors->has('roles'))
                    <span style="color: red">
                        {{ $errors->first('roles') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
@endsection
