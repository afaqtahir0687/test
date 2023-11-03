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
            <a href="{{ url('products/index') }}" class="btn btn-info">List Product</a>
        </div>
            <div class="card">
                <div class="card-header">Create Products</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('products/store') }}">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <input type="description" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="price">Price</label>
                            <input type="price" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="stock_quantity">Stock_Quantity</label>
                            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                        </div>
                        <div class="class mt-4">
                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
