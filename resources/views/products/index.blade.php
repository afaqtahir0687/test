@extends('layouts.app')

@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-4">
            <table class="table table-bordered table-hover text-center" id="example">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock Quantity</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productsList as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['price']}}</td>
                        <td>{{ $item['stock_quantity']}}</td>
                        <td class="">
                            <a href="{{ url('/') }}" class="btn btn-info">Add</a>
                            <a href="{{ url('products/edit', ['id' => $item['id']]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('products/destroy', ['id' => $item['id']]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
