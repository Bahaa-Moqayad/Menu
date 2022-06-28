@extends('site.master')
@section('content')

    <section class="category-section">
        <div class="container">
            <h1 class="text-center">
                All Categories
            </h1>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                    <div class="card">
                        <img src="{{ asset('siteasset/img/Logo.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
