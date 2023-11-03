@extends('layouts.app')

@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <a href="{{ route('users.create') }}" class="btn btn-info">Add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <table class="table table-bordered table-hover text-center" id="example">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        {{-- <th scope="col">Password</th> --}}
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id ?? ''}}</td>
                        <td>{{ $item->name ?? ''}}</td>
                        <td>{{ $item->email ?? ''}}</td>
                        {{-- <td>{{ $item->password ?? ''}}</td> --}}
                        <td class="align-middle">
                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
