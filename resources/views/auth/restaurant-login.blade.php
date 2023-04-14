@extends('layouts.app')

@section('content')
<div id="login" class="">
    <div class="position-absolute top-0 start-0">
      <a rel="stylesheet" href="{{ route('login') }}">User - Login</a>
    </div>
    <div class="login-card">
      <div class="img-holder">
      </div>
      <div class="form-holder">
        <h1 class="mt-5">Restaurant - Login</h1>
        <form action="{{ route('restaurant.login.submit') }}" method="POST">
          @csrf
          <input type="text" name="email" id="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>

          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror

          <input type="password" name="password" id="passsword" placeholder="Password" class="@error('password') is-invalid @enderror" required>

          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror

          <div class="row mb-3 w-100">
            <div class="col-md-fluid  ">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label text-white" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
          </div>

          <input type="submit" value="Login" name="login" class="mb-5">

          <div class="row mb-0 w-100">
            <div class="col-md-12 p-0">
                {{-- <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button> --}}

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection