@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center pt-2 pb-2">
                <img src="{{url('/img/shield.png')}}" width="200px" height="auto" >
                <h1 class="display-6 text-success"> <strong>Security Scheduling System</strong></h1>
            </div>            
            <div class="card bg-white">
                <div class="card-body">
                    <div class="m-sm-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __('E-Mail Address') }}</label>
                                <input class="form-control form-control @error('email') is-invalid @enderror" type="" name="email" placeholder="Enter your email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Password') }}</label>
                                <input id="password" class="form-control form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password"/>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="row justify-between">
                                <div class="col">
                                    <label class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="form-check-label">
                                        {{ __('Remember Me') }}
                                    </span>
                                </label>
                                </div>
                                       
                                <div class="col text-end">
                                    @if (Route::has('password.request'))
                                        <a class="btn text-success" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>                         
                                
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-success">{{ __('Login') }}</button>
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn ">Dont have account? Register</a>
                            @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
