@extends('admin.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Category</h1>
        <a class="btn btn-dark" href="{{ route('admin.categories.index') }}">All Categories</a>
    </div>
    @include('admin.errors')
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>

        <div class="mb-3">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control" placeholder="Image">
        </div>
        <button class="btn btn-success px-5">Save</button>
    </form>
@stop
