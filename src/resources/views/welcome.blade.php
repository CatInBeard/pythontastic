<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>pythontastic.space</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-1 fixed-top">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item px-2 pt-1">
                        <a class="btn btn-primary" href="#">Run python!</a>
                    </li>
                    <li class="nav-item px-2 pt-1">
                        <a class="btn btn-success" href="#">Sign in</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-xxl mt-5 pt-3 px-1">
            <div class="row mt-4">
                <div class="col">
                    <h1 class="text-center">Welcome to pythontastic.space</h1>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                </div>
                <div class="col">
                    <div class="card p-1" style="min-width:25rem">
                    <img src="/img/terminal.png" class="card-img-top" alt="terminal">
                    <div class="card-body">
                        <h5 class="card-title">Run your python code in browser!</h5>
                        <p class="card-text">You need only a web browser to run your python programms.</p>
                        <a href="#" class="btn btn-primary">Try it now!</a>
                    </div>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </body>
</html>
