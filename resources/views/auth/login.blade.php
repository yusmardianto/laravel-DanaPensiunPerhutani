@extends('layouts.masterclean')

@section('title', config('app.name').' | Login')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
      <br>
      <br>
      <br>
      <br>
      <br>
        <div>
            <img src="{{asset('img/dapen-logoputih.png')}}" alt="" width="220px" height="auto">
        </div>
        <br>
        <h4 style="color:white">Selamat Datang di siDAPEN</h4>
        <p style="color:white">Silahkan login untuk dapat melanjutkan</p>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="{{ __('Username') }}" required="">
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" name="password" required="">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}"><small>Lupa password?</small></a>
            @endif
        </form>
        <p class="m-t" style="color:white"> <small>Sistem Informasi Dana Pensiun<br> Perum Perhutani &copy; 2020</small> </p>
    </div>
</div>

@endsection
