<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   <meta charset="utf-8">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/style.css"> 
    <div id="fb-root"></div>
    <link rel="stylesheet" href="public//css/custom.css">
<script src="public/sidebar/vendor/jquery/jquery.min.js"></script>
  <script src="public/sidebar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <link href="public/sidebar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/sidebar/css/simple-sidebar.css" rel="stylesheet">
  <link href="public/fontawesome/css/all.css" rel="stylesheet"> 
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
<div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Bush Pack Hardware </div>
      <div class="list-group list-group-flush">
        <a href="home" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="stock" class="list-group-item list-group-item-action bg-light">Stock</a>
        <a href="sales" class="list-group-item list-group-item-action bg-light sales">Sales</a>
        <a href="point_of_sale" class="list-group-item list-group-item-action bg-light">Point of Sale (POS)</a>
        <a href="cart" class="list-group-item list-group-item-action bg-light">Current Cart</a>
        <a href="reports" class="list-group-item list-group-item-action bg-light sales">Reports</a>
        <a href="cart" class="list-group-item list-group-item-action bg-light">Invoices</a>
        <a href="accounts" class="list-group-item list-group-item-action bg-light sales">Accounts</a>
      </div>
    </div>
    @if(@session('permission')=="salesperson")
    <script type="text/javascript">
      $(".sales").hide();
    </script>
    @else
   <script type="text/javascript">
      $(".sales").show();
    </script>
    @endif
