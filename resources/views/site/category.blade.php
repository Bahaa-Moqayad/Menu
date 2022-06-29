@extends('site.master')
@section('title', $category->name . ' | ' . env('APP_NAME'))
@section('content')

    <section class="category-section">
        <div class="container">
            <h1 class="text-center">
                {{ $category->name }}
            </h1>
            <div class="row">
                @foreach ($meals as $meal)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                        <div class="card">
                            <img src=" {{ $meal->image && file_exists(public_path('uploads/images/meals/' . $meal->image)) ? asset('uploads/images/meals/' . $meal->image) : asset('siteasset/img/Image-Not-Available.png') }}"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $meal->name }}</h5>
                                <p class="card-text">{{ $meal->description }}</p>
                                @if ($meal->sale_price)
                                    <span
                                        style="color: #4d4d4d;
                                    font-size: 22px;
                                    text-decoration: line-through;">{{ $meal->price }}</span>
                                    <span style="color: red;font-size: 22px;">{{ $meal->sale_price }}</span>
                                @else
                                    <span style="color: red;font-size: 22px;">{{ $meal->price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@stop
