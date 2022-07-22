@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Merchant</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('merchants.index') }}">merchants</a></li>
            <li class="breadcrumb-item active">Add Merchant</li>
        </ol>
        @include('layouts.flash-message')
        <form action="{{ route('merchants.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Merchant Name" id="name" name="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span style="color: red">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="subdomain" class="form-label">Subdomain</label>
                <input type="text" class="form-control" placeholder="Merchant Domain" id="subdomain" name="subdomain" value="{{old('subdomain')}}">
                @if ($errors->has('subdomain'))
                    <span style="color: red">
                        {{ $errors->first('subdomain') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
@endsection
