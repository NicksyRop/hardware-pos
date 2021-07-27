
<div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
         @include('ui.page')
                <div class="container" style="margin-top: 10px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h6>Products In Our Store</h6>
                        <input type="search" name="search" id="search" class="form-control mt-2 col-8" placeholder="search here">
                    </div>
                </div>
                <div class="row">
                    <table class="table table-striped" id="table">
                        <thead><thead><th>Item Name</th> <th>Price</th> <th>Minimum Req</th> <th>Quantity</th> <th>Action</th></thead></thead>
                        @foreach($products as $pro)
                    <tr>
                        <td> <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a></td>
                        <td>${{ $pro->price }}</td>
                        <td>{{ $pro->minimum_req }}</td>
                        <td>{{ $pro->quantity }}</td>
                        <td><form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->minimum_req }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->id }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div  style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form></td>

                    </tr>
                    @endforeach
                    </table>
                    <!-- @foreach($products as $pro)
                        <div class="col-lg-3" id="table">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                    <p>${{ $pro->price }}</p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->minimum_req }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->id }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach -->
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>    
    </div>
  </div>
<script type="text/javascript">
        function register(){
            $("#form").show(1000);
            $("#table").hide(1000);
            

        }
        function login(){
            $("#form").hide(1000);
            $("#table").show(1000);
            
        }
        //login();
    </script>
    <script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>