@extends('layouts.app')

@section('contents')


<style>
    .card {
        margin-top: 20px;
    }
    
</style>

{{-- @if($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('users.index') }}" class="btn btn-info">List User</a>
        </div>
            <div class="card">
                <div class="card-header">Create User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="class mt-4">
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
