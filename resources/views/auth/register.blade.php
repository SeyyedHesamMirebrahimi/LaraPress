@extends('layouts.auth')
@section('content')
                    <form method="POST" class="login100-form validate-form" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <span class="login100-form-title p-b-43">

                        </span>
                        <div class="wrap-input100 validate-input">
                          <input class="input100 shadow-input " name="name" value="{{ old('name') }}" required autofocus autocomplete="off">
                          <span class="focus-input100"></span>
                          <span class="label-input100">{{ __('نام و نام خانوادگی') }}</span>
                        </div>
                        <div class="wrap-input100 validate-input">
                          <input class="input100 shadow-input " name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                          <span class="focus-input100"></span>
                          <span class="label-input100">{{ __('آدرس رایانامه') }}</span>
                        </div>
                        <div class="wrap-input100 validate-input">
                          <input class="input100 shadow-input " type="password" name="password" required autofocus autocomplete="off">
                          <span class="focus-input100"></span>
                          <span class="label-input100">{{ __('کلمه عبور') }}</span>
                        </div>
                        <div class="wrap-input100 validate-input">
                          <input class="input100 shadow-input " type="password" name="password_confirmation" required autofocus autocomplete="off">
                          <span class="focus-input100"></span>
                          <span class="label-input100">{{ __('تکرار کلمه عبور') }}</span>
                        </div>
                                <button type="submit" class="login100-form-btn">
                                    {{ __('ثبت نام') }}
                                </button>
                    </form>
                    @if ($errors->has('email') || $errors->has('password'))
                    <script type="text/javascript">
                    swal({
                          type: 'error',
                          title: 'اوپس...',
                          text: 'اطلاعات وارد شده نامعتبر می باشند',
                        });
                    </script>
                    @endif
@endsection
