@extends('site.master')
@section('content')

    <section class="category-section">
        <div class="container">
            <h1 class="text-center">
                الأصناف
            </h1>
            <div class="row">
                @foreach ($categories as $cat)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                        <div class="card">
                            <img src=" {{ $cat->image && file_exists(public_path('uploads/images/categories/' . $cat->image)) ? asset('uploads/images/categories/' . $cat->image) : asset('siteasset/img/Image-Not-Available.png') }}"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $cat->name }}</h5>

                                <a href="{{ route('site.category', $cat->id) }}" class="btn btn-primary">الوجبات</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@stop
