@extends('admin.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Categories</h1>
        <a class="btn btn-dark" href="{{ route('admin.categories.create') }}">Add New Category</a>
    </div>

    <form action="{{ route('admin.categories.index') }}" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." value="{{ request()->keyword }}"
                name="keyword">
            <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td><img width="100" src="{{ asset('uploads/images/categories/' . $category->image) }}" alt="">
                </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.edit', $category->id) }}"><i
                            class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-danger"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $categories->links() }}
@stop
