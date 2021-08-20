

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <div id="fb-root"></div>
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
<script src="{{asset('sidebar/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('sidebar/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <link href="{{asset('sidebar/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('sidebar/css/simple-sidebar.css')}}" rel="stylesheet">
   <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
<body class="body">
	  <div class="container col-lg-12 col-md-6 card-header" style="">
  	<div class="row">
  		<div class="col-sm-12 col-md-6 col-lg-6">

  				<h4 class="text-success text-center">BushPark Hardware</h4>

  		</div>
  		<div class="col-sm-12 col-md-6 col-lg-6">
  				<p class="text-right text-danger mr-5"><i style="color: red;" class="fas fa-paint-roller fa-3x "></i></p>


  		</div>
  	</div>
  </div>
<div class="container col-lg-12 col-md-6 mt-5 card-body">
	<div class="row ">
		<div class="col-sm-12 col-md-3 col-lg-3"></div>
		<div class="col-sm-12 col-md-6 col-lg-6 shadow p-3 mb-5 bg-white rounded bg-light">
			<form class="" id="logins" action="{{ route('login')}}" method="post">
				{{csrf_field()}}
   <div class="text-center text-success">{{@session("status")}}</div>
			@if(@session('login'))
<div class="alert alert-success">
	{{@session('login')}}
</div>
@endif
		<h4 class="text-center">Login To Continue</h4>
		<div class="form-group">

			<label>Username</label>
			<span style="color: red;"> @error("Username")
								{{ $message }}
							@enderror </span>
			<input type="text" class="form-control" required="" name="username" value="{{old('Username')}}">
		</div>
		<div class="form-group">
			<label>Password</label><a href="forgot" style="float: right;color: blue;text-decoration: underline;">Forgot Password</a>
			<span style="color: red;"> @error("Password")
								{{ $message }}
							@enderror </span>
			<input type="password" required="" minlength="4" class="form-control" name="password">

		</div>
		<div class="form-group text-center">
			<button type="submit" style="width: 50%;" class="btn btn-primary text-center" name="login" >Login</button>
		</div>
		<div class=""><a href="#" onclick="register();" style="padding: 20px;color: blue;" class="btn-default text-center">Forgot  Password</a></div>
	</form>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3"></div>
	</div>
</div>
</body>

<style type="text/css">
	.body{
		background-color:#F5FFFA;
	}
</style>
