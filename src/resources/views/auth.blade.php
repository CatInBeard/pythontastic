@extends ("layouts.main")

@section("head_add")
@stop

@section ("title", "auth")

@section ("body")
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">   
            <h1>
                Sign in    
            </h1>
        </div>
    </div>
    @if ($errors->any())
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>  
    @endif
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">   
            <form method="post" action="{{route('user.auth.run')}}">
                @csrf
                <div class="form-group pb-2">
                    <label for="email" class="pb-1">
                        Email:
                    </label>
                    <input required class="form-control" type="email" name="email" id="email" placeholder="user@example.com">
                </div>  
                <div class="form-group pb-4">
                    <label for="password" class="pb-1">
                        Password:    
                    </label>
                    <input required name="password" id="password" type="password"  class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" id="submit-button" value="Sign in">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 pt-3">
            <a href="{{route('user.reg.show')}}" class="text-muted">Sign up</a>
        </div>    
    </div>
@stop