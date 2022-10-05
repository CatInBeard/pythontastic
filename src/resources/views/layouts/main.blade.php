<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | pythontastic.space</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        @yield('head_add')        

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-1 fixed-top">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item px-2 pt-1">
                        <a class="nav-link" href="{{route('welcome.show')}}"><i class="bi bi-house-door-fill"></i></a>
                    </li>
                    @guest
                    <li class="nav-item px-2 pt-1">
                        <a class="btn btn-success" href="{{route('user.auth.show')}}">Sign in</a>
                    </li>
                    <li class="nav-item px-2 pt-1">
                        <a class="btn btn-outline-success" href="{{route('user.reg.show')}}">Sign up</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item px-2 pt-1">
                        <a class="nav-link" href="{{route('user.profile.show')}}"><i class="bi bi-person-circle"></i></a>
                    </li>
                    <li class="nav-item px-2 pt-1">
                        <a class="btn btn-outline-success" href="{{route('user.logout')}}"><i class="bi bi-box-arrow-left"></i></a>
                    </li>
                    @endauth
                    @if(!Route::is('repl.*'))
                    <li class="nav-item px-2 pt-1">
                        <a class="btn btn-primary" href="{{route('repl.show')}}">Run python!<i class="bi bi-play-fill"></i></a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="container mt-5 pt-3 px-1 min-vh-100">
        @yield('body')
        </div>
        <footer class="container-xxl d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <a class="text-muted" href="https://github.com/CatInBeard/pythontastic">https://github.com/CatInBeard/pythontastic</a>
        </footer>
    </body>
</html>