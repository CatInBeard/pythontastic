@extends ("layout.main")

@section ("title", "Welcome ")

@section ("body")
    <div class="row mt-4">
        <div class="col">
            <h1 class="text-center">Welcome to pythontastic.space</h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
        </div>
        <div class="col-10">
            <div class="card p-1 w-100">
            <img src="/img/terminal.png" class="card-img-top" alt="terminal">
            <div class="card-body">
                <h5 class="card-title">Run your python code in browser!</h5>
                <p class="card-text">You need only a web browser to run your python programms.</p>
                <a href="{{route('repl.show')}}" class="btn btn-primary">Try it now!</a>
            </div>
            </div>
        </div>
        <div class="col">
        </div>
    </div>
@stop