@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Permissions</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
            <li class="breadcrumb-item active">Add Permissions</li>
        </ol>
        @include('layouts.flash-message')
        <form action="{{ route('permissions.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Permission For</label>
                <input type="text" class="form-control" placeholder="Permission for" id="name" name="name">
                @if ($errors->has('name'))
                    <span style="color: red">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Create Permissions">
            </div>
        </form>
    </div>
@endsection
