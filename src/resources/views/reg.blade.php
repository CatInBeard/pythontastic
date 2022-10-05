@extends ("layouts.main")

@section("head_add")
@stop

@section ("title", "auth")

@section ("body")
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">   
            <h1>
                Sign up    
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
            <form method="post">
                @csrf
                <div class="form-group pb-2">
                    <label for="username" class="pb-1">
                        Username:
                    </label>
                    <input required class="form-control" type="text" name="username" id="username" placeholder="newUser123">
                </div>  
                <div class="form-group pb-2">
                    <label for="email" class="pb-1">
                        Email:
                    </label>
                    <input required class="form-control" type="email" name="email" id="email" placeholder="user@example.com">
                </div>  
                <div class="form-group pb-2">
                    <label for="password" class="pb-1">
                        Password:    
                    </label>
                    <input required name="password" id="password" type="password"  class="form-control">
                </div>
                <div class="form-group pb-4">
                    <label for="password-confirm" class="pb-1">
                        Confirm password:    
                    </label>
                    <input required name="password-confirm" id="password-confirm" type="password"  class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" id="submit-button" value="Sign up">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 pt-3">
            <a href="{{route('user.auth.show')}}" class="text-muted">Sign in</a>
        </div>    
    </div>
@stop