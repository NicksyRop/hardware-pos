<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   <meta charset="utf-8">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"> 
    <div id="fb-root"></div>
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
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
    <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>::Bush park::</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('sidebar/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('sidebar/css/simple-sidebar.css')}}" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
    </div>
  </div>
  <script src="{{asset('sidebar/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('sidebar/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>

     
  @if(@session()->has("name"))
  <script type="text/javascript">
      $("#log_in").hide();
  </script>
  @endif
   @if(!@session()->has("name"))
   <script type="text/javascript">
      $("#log_out").hide();
  </script>
  @endif
  <style type="text/css">
    label{
      color: black;
      font-family: 17px;
    }
   
      #main_menu{
      }
      .card{
       
        width: 100%;
        border:2px solid white;
      }
  </style>
  <div class="modal fade" id="logind">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-head">
                  <button type="button" class="close" data-dismiss="modal">&times</button>
              </div>
              <div class="modal-body">
                  @include("ui.login")
              </div>
          </div>
      </div>
  </div>
  @if(@session()->has("status1"))
<script type="text/javascript">
    $("#logind").modal("toggle");
</script>
@endif
 @if(@session()->has("register"))
<script type="text/javascript">
    $("#logind").modal("toggle");
    $("#logins").hide(100);

</script>
@endif


  
   