<x-guest-layout>
    <!-- Session Status -->
    @section('form_title')
        Login
    @endsection
    @if(session('status'))
        <div class="alert alert-danger">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}" >
        @csrf
        @method('post')
        <div class="form-floating mb-3">
            <input class="form-control" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" />
            <label for="inputEmail">Email address</label>
            @if($errors->has('email'))
                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputPassword" type="password" name="password"  value="{{ old('password') }}" placeholder="Password" />
            <label for="inputPassword">Password</label>
            @if($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button class="btn btn-primary" type="submit">Login</button>
        </div>
    </form> 
    <div class="card-footer text-center py-3">
        <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
    </div>  
</x-guest-layout>




