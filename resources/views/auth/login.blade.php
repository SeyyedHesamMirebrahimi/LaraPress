@extends('layouts.auth')
@section('content')






<form class="login100-form validate-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
      @csrf
  <span class="login100-form-title p-b-43">
  </span>
  <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
    <input class="input100 shadow-input " id="email" name="email" value="{{ old('email') }}" required autofocus">
    <span class="focus-input100"></span>
    <span class="label-input100">{{ __('آدرس رایانامه') }}</span>
  </div>
  <div class="wrap-input100 validate-input" data-validate="Password is required">
    <input class="input100 shadow-input " type="password" name="password" required">
    <span class="focus-input100"></span>
    <span class="label-input100">{{ __('کلمه عبور') }}</span>
  </div>
  <div class="flex-sb-m w-full p-t-3 p-b-32">
      <a href="{{ route('password.request') }}" class="txt1">
          {{ __('فراموشی کلمه عبور') }}
      </a>
      <div class="contact100-form-checkbox">
        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="label-checkbox100" for="ckb1">
          {{ __('مرا بخاطر بسپار') }}
        </label>
      </div>
  </div>
  <div class="container-login100-form-btn">
    <button type="submit" class="login100-form-btn">
        {{ __('ورود') }}
    </button>
  </div>
</form>
@if($errors->any())
    <script type="text/javascript">
        swal({
            type: 'error',
            title: 'اوپس...',
            text: "{{$errors->first()}}",
            footer: '<a href="{{ route('password.request') }}">{{ __('فراموشی کلمه عبور') }}</a>'
        });
    </script>
@endif
@endsection
