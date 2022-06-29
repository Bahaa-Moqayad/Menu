<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('APP_NAME'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('siteasset/css/style.css') }}">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
</head>

@yield('styles')

<style>
    .image-holder {
        background-image: url({{ asset('siteasset/img/banner.jpg') }});
    }
</style>

<body>
    {{-- -------------------------- Start Nav  -------------------------- --}}
    <div class="image-holder">
    </div>
    {{-- -------------------------- End Nav  -------------------------- --}}
    @yield('content')
    {{-- -------------------------- Start Footer  -------------------------- --}}

    <footer>
        <div class="container text-center">
            <div class="icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
            <p class="text-center">
                CopyRight <i class="fa fa-copyright"></i> 2022 All Rights Reserved
            </p>
        </div>
    </footer>
    {{-- -------------------------- End Footer  -------------------------- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('siteasset/js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>
