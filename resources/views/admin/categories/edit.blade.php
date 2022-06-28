@extends('admin.master')
@section('title', 'Edit Meals | ' . env('APP_NAME'))
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Meal</h1>
        <a class="btn btn-dark" href="{{ route('admin.meals.index') }}">All Meals</a>
    </div>
    @include('admin.errors')
    <form action="{{ route('admin.meals.update', $meal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $meal->name }}">
        </div>

        <div class="mb-3">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control" placeholder="Image">
            <img width="80" src="{{ asset('uploads/images/meals/' . $meal->image) }}" alt="">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <input id="tiny" type="text" name="description" class="form-control" placeholder="Description"
                value="{{ $meal->description }}">
        </div>

        <div class="mb-3">
            <label for="">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $meal->price }}">
        </div>

        <div class="mb-3">
            <label>Sale Price</label>
            <input type="text" name="sale_price" class="form-control" placeholder="Sale Price"
                value="{{ $product->sale_price }}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <option value="" selected disabled> >--Select--< </option>
                        @foreach ($categories as $item)
                <option {{ $meal->category_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                    {{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-info px-5">Save</button>
    </form>

@stop
