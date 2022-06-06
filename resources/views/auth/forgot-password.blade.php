@extends('layouts.master_home')
@section('home_content')
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title></title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{asset('backend/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
  <link href="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{asset('backend/assets/css/sleek.css')}}" />

  

  <!-- FAVICON -->
  <link href="assets/img/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{asset('backend/assets/plugins/nprogress/nprogress.js')}}"></script>
</head>

</head>
<body class="" id="body">
    <div class="container d-flex flex-column justbg-light-grayify-content-between vh-100" >
        <div class="row justify-content-center mt-5" >
          <div class="col-xl-5 col-lg-6 col-md-10" style="margin-top: 50px"  >
            <div class="card" >
                <div class="card-header" style="background-color: black"  >
                    <div class="app-brand" style="background-color: black">
                      <a href="/index.html">
                        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                          viewBox="0 0 30 33">
                          <g fill="none" fill-rule="evenodd" >
                            <path class="logo-fill" fill="#1BBD36" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                          </g>
                        </svg>
                        <span class="brand-name"> Forget Password</span>
                      </a>
                    </div>
                  </div>
        <div class="mb-4 text-sm text-gray-600" style="padding: 20px">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        
        <div class="card-body p-5" >
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row" style="padding: 50px;padding-top:0px;">

            <div class="form-group col-md-12 mb-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="form-group col-md-12 ">
                
                <x-jet-button style="background-color:#1BBD36;">
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
                @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600" style="padding: 20px;padding-top:10px;color:#1BBD36;">
                {{ session('status') }}
            </div>
        @endif
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
</div>

</div>

    </body>
    @endsection

