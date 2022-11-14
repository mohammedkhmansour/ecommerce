{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>تسجيل الدخول</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}" />

</head>

<body>

 <div class="wrapper">

<!--=================================
 preloader -->

<div id="pre-loader">
    <img src="images/pre-loader/loader-01.svg" alt="">
</div>

<!--=================================
 preloader -->

 <!--=================================
 login-->
 <form method="POST" action="{{ route('login') }}">
    @csrf
<section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(images/login-bg.jpg);" >
  <div class="container">
     <div class="row justify-content-center no-gutters vertical-align">
       <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
         <div class="login-fancy">
            <h2 class="text-white mb-20">اهلا بك</h2>
            <p class="mb-20 text-white">قم بتسجيل حساب مجاني في متجرنا لتستفيد من العروض التي نقدمها</p>

         </div>
       </div>
       <div class="col-lg-4 col-md-6 bg-dark">
        <div class="login-fancy pb-40 clearfix">
        <h3 class="mb-30">تسجيل الدخول</h3>
         <div class="section-field mb-20">
             <label class="mb-10" for="name">User name or email or phone </label>
               <input id="name" class="web form-control" type="text" placeholder="User name" name="email">
               <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div class="section-field mb-20">
             <label class="mb-10" for="Password">Password* </label>
               <input id="Password" class="Password form-control" type="password" placeholder="Password" name="password">
               <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>
            <div class="section-field">
              <div class="remember-checkbox mb-30">
                 <input type="checkbox" class="form-control" name="remember" id="two" />

                 <label for="two"> تذكرني</label>
                 <a href="password-recovery.html" class="float-right"></a>
                </div>
              </div>
              <button type="submit" class="button">
                {{-- <a href="" class="button"> --}}
                    <span>تسجيل الدخول</span>
                    <i class="fa fa-check"></i>
                 {{-- </a> --}}
              </button>

          </div>
        </div>
      </div>
  </div>
</section>
 </form>
<!--=================================
 login-->

</div>
@include('layouts.footer')
