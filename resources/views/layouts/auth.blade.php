<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{ asset('panel/css/app.css') }}" rel="stylesheet">
	<link rel="icon" type="image/png" href="{{ asset('panel/images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('panel/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('panel/css/sweetalert2.min.css') }}">
  <script src="{{ asset('panel/js/sweetalert2.min.js') }}"></script>
</head>
<body style="background-color: #666666;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
        <div class="login100-more" style="background-image: url('images/login.png');">
          <div class="login-info" id="userInfo">
            <img src="images/login-avatar.png" alt="avatar">
            <h2>ورود به سیستم</h2>
          </div>
        </div>
				@yield('content')
			</div>
		</div>
	</div>
	<script src="{{ asset('panel/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('panel/vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('panel/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('panel/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('panel/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('panel/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('panel/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('panel/vendor/countdowntime/countdowntime.js') }}"></script>
	<script src="{{ asset('panel/js/main.js') }}"></script>
</body>
</html>
