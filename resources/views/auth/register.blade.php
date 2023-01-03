@extends('layouts.app')

@section('content')


<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Register</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('css/app.css')}}">

  </head>
<style>
           html {
            height: 100%;
        }
        body {
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Text Align */
        .text-c {
            text-align: center;
        }
        .text-l {
            text-align: left;
        }
        .text-r {
            text-align: right
        }
        .text-j {
            text-align: justify;
        }

        /* Text Color */
        .text-whitesmoke {
            color: whitesmoke
        }
        .text-darkyellow {
            color: rgba(255, 235, 59, 0.432)
        }

        /* Lines */

        .line-b {
            border-bottom: 1px solid #FFEB3B !important;
        }

        /* Buttons */
        .button {
            border-radius: 3px;
        }
        .form-button {
            background-color: rgba(255, 235, 59, 0.24);
            border-color: rgba(255, 235, 59, 0.24);
            color: #e6e6e6;
        }
        .form-button:hover,
        .form-button:focus,
        .form-button:active,
        .form-button.active,
        .form-button:active:focus,
        .form-button:active:hover,
        .form-button.active:hover,
        .form-button.active:focus {
            background-color: rgba(255, 235, 59, 0.473);
            border-color: rgba(255, 235, 59, 0.473);
            color: #e6e6e6;
        }
        .button-l {
            width: 100% !important;
        }

        /* Margins g(global) - l(left) - r(right) - t(top) - b(bottom) */

        .margin-g {
            margin: 15px;
        }
        .margin-g-sm {
            margin: 10px;
        }
        .margin-g-md {
            margin: 20px;
        }
        .margin-g-lg {
            margin: 30px;
        }

        .margin-l {
            margin-left: 15px;
        }
        .margin-l-sm {
            margin-left: 10px;
        }
        .margin-l-md {
            margin-left: 20px;
        }
        .margin-l-lg {
            margin-left: 30px;
        }

        .margin-r {
            margin-right: 15px;
        }
        .margin-r-sm {
            margin-right: 10px;
        }
        .margin-r-md {
            margin-right: 20px;
        }
        .margin-r-lg {
            margin-right: 30px;
        }

        .margin-t {
            margin-top: 15px;
        }
        .margin-t-sm {
            margin-top: 10px;
        }
        .margin-t-md {
            margin-top: 20px;
        }
        .margin-t-lg {
            margin-top: 30px;
        }

        .margin-b {
            margin-bottom: 15px;
        }
        .margin-b-sm {
            margin-bottom: 10px;
        }
        .margin-b-md {
            margin-bottom: 20px;
        }
        .margin-b-lg {
            margin-bottom: 30px;
        }

        /* Bootstrap Form Control Extension */

        .form-control,
        .border-line {
            background-color: #5f5f5f;
            background-image: none;
            border: 1px solid #424242;
            border-radius: 1px;
            color: inherit;
            display: block;
            padding: 6px 12px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            width: 100%;
        }
        .form-control:focus,
        .border-line:focus {
            border-color: #FFEB3B;
            background-color: #616161;
            color: #e6e6e6;
        }
        .form-control,
        .form-control:focus {
            box-shadow: none;
        }
        .form-control::-webkit-input-placeholder { color: #BDBDBD; }

        /* Container */

        .container-content {
            background-color: #3a3a3aa2;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #FFEB3B;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }

        /* Backgrounds */

        .main-bg {

            background: #424242;
            background: linear-gradient( #424242, #212121);
        }

        /* Login & Register Pages*/

        .login-container {
            max-width: 400px;
            z-index: 100;
            margin: 0 auto;
            padding-top: 0px;
        }
        .login.login-container {
            width: 300px;
        }
        .wrapper.login-container {
            margin-top: 100px;
        }
        .logo-badge {
            color: #e6e6e6;
            font-size: 80px;
            font-weight: 800;
            letter-spacing: -10px;
            margin-bottom: 0;
        }
   </style>
   </head>
<body class="main-bg">
    <div class="login-container text-c animated flipInX">
    <div class="d-flex justify-content-end mb-4 pull-center">
    <form method="POST" action="{{ route('register') }}">
     @csrf

            </div>
            <div>
                <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
            </div>
                <h3 class="text-whitesmoke">Student Management System</h3>
                <p class="text-whitesmoke">Sign In</p>
            <div class="container-content">
                <form class="margin-t">
                    <div class="form-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">
                         <span class="fas fa-user"></span>
                    </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="New Password" required autocomplete="new-password">
                        
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-unlock-alt"></span>
                        </div>
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Password Confirmation" required autocomplete="new-password">
                    </div>
                    </div>
                    <div class="row">
            <div class="icheck-primary ml-4">
              <input type="checkbox" id="agree" name="terms" value="agree"  class="@error('agree') is-invalid @enderror">
              @error('agree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <label for="agree">
              <p class="text-muted" > I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
                    <button type="submit" class="form-button button-l margin-b">Sign In</button>
    
                    <!-- <a class="text-darkyellow" href="#"><small>Forgot your password?</small></a> -->
                    <a class="text-darkyellow text-center" href="#"><small>Do not have an account?</small></a>
                    <!-- <a class="text-darkyellow" href="#"><small>Sign Up</small></a> -->
                </form>
                <p class="margin-t text-whitesmoke"><small> sreeginy &copy; 2021</small> </p>
            </div>
        </div>

      
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('js/app.js')}}"></script>
  </body>
  </html>

@endsection