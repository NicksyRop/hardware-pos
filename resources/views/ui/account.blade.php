 @include('pages.head')
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{ asset('loginv1') }}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('loginv1') }}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('loginv1') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('loginv1') }}/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('loginv1') }}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('loginv1') }}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('loginv1') }}/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginv1') }}/css/main.css">

  <div class="container col-sm-6 col-lg-8 col-md-8 " style="margin-top: 10vh;">
    <div class="limiter" style="">
    <div class="container-login100 shadow p-3 mb-5 bg-white rounded bg-light" >
      <div class="wrap-login100">
        <div class="login100-pic js-tilt my-auto" data-tilt>
          <img src="{{ asset('loginv1') }}/images/img.png" alt="IMG">
        </div>
        <form class="login100-form my-auto validate-form" action="signin" method="post"> 
          @if(session('login'))
<div class="alert alert-success">
  {{session('login')}}
</div>
@endif
           @csrf
          <span class="login100-form-title">
            Member Login
          </span>
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
             <span style="color: red;">  @error("email"){{ $email=$message }}@enderror </span>

            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
             <span style="color: red;">  @error("password"){{ $password=$message }}@enderror </span>
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
           @if (Route::has('password.request'))
                <span class="txt1">
              Forgot
            </span>
            <a class="txt2" href="{{ route('password.request') }}" >
              Username / Password?
            </a>
            @endif
          </div>
          

          <div class="text-center ">
            <a class="txt2"  href="register_user">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
             <a href="register_user" class="text-light">
                <small>{{ __('Create new account') }}</small>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
<script src="{{ asset('loginv1') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="{{ asset('loginv1') }}/vendor/bootstrap/js/popper.js"></script>
  <script src="{{ asset('loginv1') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="{{ asset('loginv1') }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="{{ asset('loginv1') }}/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="{{ asset('loginv1') }}/js/main.js"></script>
<!--   <div  class="footer fixed-bottom"> @include('pages.footer')</div> -->

