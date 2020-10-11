<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('Meta')

    <title>@yield('Title') - {{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('res/bootstrap/bootstrap-4.6.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('res/fontawesome-5.10.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('StyleSheet')
</head>
<body>

<section class="bg-light">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md">
            <div>
                <button class="navbar-toggler" type="button"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="#">
                    <img src="{{ asset('logo.png') }}" alt="">
                </a>
            </div>
            @section('Nav')
                @include('component.nav')
            @show
        </nav>
    </div>
</section>

@if(count($_breadcrumbs) > 0)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($_breadcrumbs as $key => $url)
                @if($url !== null)
                    <li class="breadcrumb-item">
                        <a href="{{ $url }}">{{ $key }}</a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $key }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif

@yield('PreContent')
<section id="content" class="container-fluid">
    @yield('Content')
</section>
@yield('AfterContent')

@section('Footer')
    <section id="footer" class="bg-dark">
        Footer
    </section>
@show

</body>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('res/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('res/bootstrap/bootstrap-4.6.2.min.js') }}"></script>
@yield('Script')

</html>
