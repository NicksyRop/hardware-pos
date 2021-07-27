
<div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
         @include('ui.page')
             <div class="container" style="margin-top: 20px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="shop">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
                @else
                    <h4>No Product(s) In Your Cart</h4><br>
                    <a href="point_of_sale" class="btn btn-dark">Continue Shopping</a>
                @endif
                @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-5">
                            <p>
                                <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b>
                                <b>Price: </b>${{ $item->price }}
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                               id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                        <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i class="fa fa-edit">update</i></button>
                                    </div>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash">remove</i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Clear Cart</button>
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                            <?php 
                            $Total=\Cart::getTotal();

                             ?>
                        </ul>
                    </div>
                    <br>
                    <a href="point_of_sale" class="btn btn-dark">Continue Shopping</a>
                    <a onclick="return confirm('confirm Checkout?');" href="checkout?cartCollection={{$cartCollection}} & total=<?php echo $Total;?>"  class="btn btn-success">Proceed To Checkout</a>
                    <a onclick="return confirm('confirm Invoice Generation?');" href="generate_invoice?cartCollection={{$cartCollection}} & total=<?php echo $Total;?>"  class="btn btn-success">Generate Invoice</a>
                </div>
            @endif
        </div>
        <br><br>
    </div>      
    </div>
  </div>
<script type="text/javascript">
        
        //login();
    </script>