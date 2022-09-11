@extends ("layout.main")

@section("head_add")
    <script src="/scripts/textarea_tab.js"></script>
@stop

@section ("title", "python REPL")

@section ("body")
    <div class="row">
        <div class="col">   
            <div class="card p-3">
                <form method="post">
                    @csrf
                    <div class="form-group">
                    <textarea id="code" class="form-control" name="code" style="min-height:10rem">@isset($code){{$code}}@endisset</textarea>
                    </div>  
                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary" value="RUN!">
                    </div>
                </form>
                @isset($output)
                    <hr class="my-1">
                    <h4>Output:</h4>
                    <pre>{{$output}}</pre>
                @endisset
            </div>
        </div>
    </div>
@stop