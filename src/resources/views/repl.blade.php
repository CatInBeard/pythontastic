@extends ("layouts.main")

@section("head_add")
    <script src="/scripts/textarea_tab.js"></script>
    <script src="/scripts/send_python.js"></script>
@stop

@section ("title", "python REPL")

@section ("body")
    <div class="row">
        <div class="col">   
            <div class="card p-3" id="code-card">
                <form method="post" id="code-form">
                    @csrf
                    <div class="form-group">
                    <textarea id="code" class="form-control" name="code" style="min-height:10rem">@isset($code){{$code}}@endisset</textarea>
                    </div>  
                    <div class="form-group mt-2 d-flex flex-row">
                        <div class="p-1">
                            <input type="submit" class="btn btn-primary" id="submit-button" value="RUN!">
                        </div>
                        <div class="pl-2">
                            <div class="d-none fs-2 ml-3" id="loading">
                                <i class="bi bi-hourglass-split"></i>
                            </div>
                        </div>
                    </div>
                </form>
                <hr class="my-1">
                <h4>Output:</h4>
                <div id="code-output">
                @if(isset($output))
                    <pre>{{$output}}</pre>
                @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function(){
            repl = new codeExecutableControl("code-form", "code", "code-output", "loading", "submit-button" , "{{route('api.python.run')}}")
            textareaControl = new textareaTabControl("code")
        }
    </script>
@stop