@extends ("layout.main")
@section ("body")
    <div class="row">
        <div class="col">
            <div class="card p-3">
                <form method="post">
                    @csrf
                    <div class="form-group">
                    <textarea class="form-control" name="code" style="min-height:10rem">@isset($code){{$code}}@endisset</textarea>
                    </div>  
                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary" value="RUN!">
                    </div>
                </form>
                @isset($output)
                    <hr class="my-1">
                    <span>{{$output}}</span>
                @endisset
            </div>
        </div>
    </div>
@stop