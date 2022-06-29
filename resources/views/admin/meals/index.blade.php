@extends('admin.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Meals</h1>
        <a class="btn btn-dark" href="{{ route('admin.meals.create') }}">Add New Meal</a>
    </div>

    <form action="{{ route('admin.meals.index') }}" method="get">
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
            <th>price</th>
            <th>status</th>
            <th>Category Name</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        @foreach ($meals as $meal)
            <tr>
                <td>{{ $meal->id }}</td>
                <td>{{ $meal->name }}</td>
                <td><img width="100" src="{{ asset('uploads/images/meals/' . $meal->image) }}" alt="">
                </td>
                <td>{{ $meal->price }}</td>
                @if ($meal->status === 'متوفر')
                    <td><span class="badge badge-pill badge-success">{{ $meal->status }}</span></td>
                @else
                    <td><span class="badge badge-pill badge-danger">{{ $meal->status }}</span></td>
                @endif
                <td>{{ $meal->category->name }}</td>
                <td>{{ $meal->created_at->diffForHumans() }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.meals.edit', $meal->id) }}"><i
                            class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('admin.meals.destroy', $meal->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-danger"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $meals->links() }}
@stop
