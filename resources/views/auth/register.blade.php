{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
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
<title>تسجيل حساب جديد</title>

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
 register-->
 <form method="POST" action="{{ route('register') }}">
    @csrf
<section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(images/register-bg.jpg);">

    <div class="container">
     <div class="row no-gutters">
       <div class="col-lg-4 offset-lg-1 col-md-6 login-fancy-bg bg parallax" style="background-image: url(images/register-inner-bg.jpg);">
         <div class="login-fancy">
          <h2 class="text-white mb-20">اهلا بك</h2>
          <p class="mb-20 text-white">قم بتسجيل حساب مجاني في متجرنا لتستفيد من العروض التي نقدمها</p>
         </div>
       </div>
       <div class="col-lg-4 col-md-6 bg-dark">
        <div class="login-fancy pb-40 clearfix">
        <h3 class="mb-30">انشاء حساب</h3>
         <div class="row">

             <div class="section-field mb-20 col-sm-6">
               <label class="mb-10" for="username">اسم المستحدم* </label>
                 <input id="username" class="web form-control" type="text" placeholder="username" name="username">
              </div>
               <div class="section-field mb-20 col-sm-6">
               <label class="mb-10" for="phone">رقم الجوال* </label>
                 <input id="phone" class="web form-control" type="text" placeholder="phone" name="phone">
              </div>
            </div>
            <div class="section-field mb-20">
                 <label class="mb-10" for="email">البريد الالكتروني* </label>
                  <input type="email" placeholder="Email*" id="email" class="form-control" name="email">
             </div>
             <div class="section-field mb-20">
                <label class="mb-10" for="name"> الاسم بالكامل* </label>
                 <input type="text" placeholder="name*" id="name" class="form-control" name="name">
            </div>
            <div class="section-field mb-20">
             <label class="mb-10" for="password">كلمة المرور* </label>
               <input class="Password form-control" id="password" type="password" placeholder="Password" name="password">
            </div>
            <div class="section-field mb-20">
                <label class="mb-10" for="password"> تاكيد كلمة المرور* </label>
                  <input class="Password form-control" id="password" type="password" placeholder="password_confirmation" name="password_confirmation">
               </div>
               <button type="submit">
                تسجيل
               </button>

             <p class="mt-20 mb-0">هل تمتلك حساب<a href="{{route('login')}}"> قم بتسجيل  الدخول</a></p>
          </div>

        </div>
      </div>
  </div>

</section>
</form>
<!--=================================
 register-->

</div>

@include('layouts.footer')
