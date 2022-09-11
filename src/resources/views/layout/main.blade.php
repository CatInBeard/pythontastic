<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | pythontastic.space</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

        @yield('head_add')        

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-1 fixed-top">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    @if(!Route::is('repl.*'))
                    <li class="nav-item px-2 pt-1">
                        <a class="btn btn-primary" href="{{route('repl.show')}}">Run python!</a>
                    </li>
                    @else
                    <li class="nav-item px-2 pt-1">
                        <a class="nav-link" href="{{route('welcome.show')}}">Home</a>
                    </li>
                    @endif
                    <li class="nav-item px-2 pt-1">
                        <a class="btn btn-success" href="#">Sign in</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-xxl mt-5 pt-3 px-1">
        @yield('body')
        </div>
    </body>
</html>