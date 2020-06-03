@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}">Logo</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to your account</p>

      <form method="POST" action="{{ route('login') }}">

        @csrf


        <div class="input-group mb-3">

          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

        </div>

        <div class="input-group mb-3">

          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

        </div>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>


          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Login') }}
            </button>
          </div>
          <!-- /.col -->

          <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                

                                
                            </div>
                        </div>
        </div>
      </form>

      <div class="social-auth-links text-center mb-3 d-none">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">I forgot my password</a>
        @endif
      </p>

      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new account</a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection