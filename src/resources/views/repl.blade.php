@extends ("layout.main")

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
                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary" value="RUN!">
                    </div>
                </form>
                    <hr class="my-1">
                    <h4>Output:</h4>
                @if(isset($output))
                    <pre id="code-output">{{$output}}</pre>
                @else
                    <pre id="code-output"></pre>
                @endif
            </div>
        </div>
    </div>
    <script>
        window.onload = function(){
            repl = new codeExecutableControl("code")
            textareaControl = new textareaTabControl("code")
        }
    </script>
@stop