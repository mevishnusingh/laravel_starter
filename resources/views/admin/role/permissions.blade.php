@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Roles & Permissions</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active">Roles & Permissions</li>
        </ol>
        @include('layouts.flash-message')
        @foreach ($roles as $role)
            <form action="{{ route('roles.update', $role) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card mb-4">
                    <div class="card-header" id="{{$role->name}}">
                        {{ $role->name }} Permissions
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <?php
                                    $permission_found = false;
                                    if (isset($role)) {
                                        $permission_found = $role->hasPermissionTo($permission->name);
                                    }
                                    ?>
                                    <div class="col-lg-3">
                                        <div class="form-check">
                                            <input {{($role->name == 'Admin') ? 'disabled':''}} name="permissions[]" type="checkbox"
                                                class="form-check-input"
                                                value="{{ $permission->id }}"
                                                id="permission_{{ $role->id }}_{{ $permission->id }}"
                                                {{ $permission_found ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="permission_{{ $role->id }}_{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if ($role->name != 'Admin')
                            <div class="row text-right">
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection
