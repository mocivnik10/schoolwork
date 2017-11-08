@extends('partials.layout')

@section('content')
<div class="form-wrapper">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <h2 class="text-center mb">Login</h2>

      <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
          <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
          <div class="col-sm-10">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group text-right">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>

        <div class="form-group text-right">
          <a class="btn btn-link" href="{{ route('password.request') }}">
              Forgot Your Password?
          </a>
          <button type="submit" class="btn btn-info">
              Login
          </button>
        </div>
      </form>

    </div>
    <div class="col-md-3"></div>
  </div>
</div>
@endsection
