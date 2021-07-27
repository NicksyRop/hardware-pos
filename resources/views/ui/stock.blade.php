<div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
    	 @include('ui.page')
					<div class="container">
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
						<div class="row">
							<div class="col-sm-12 col-lg-12 col-md-12">
								<input type="search" name="search" id="search" class="form-control mt-2" placeholder="search here" >
								<table class="table table-striped" id="table">
						<thead><th>ProductID</th>
							   <th>Product Name</th>
							   <th>Price</th>
							   <th>Availbale Stock</th>
							   <th>Minimum Stock</th>
							   <th>Created At</th>
							   <th>Last updated</th>
							   <th>Expiry Date</th>
							   <th colspan="2" class="text-center">Action</th>
						</thead>
						
							@foreach($stock as $key=>$value)
							<tr>
							<td>{{$value->id}}</td>
							<td>{{$value->name}}</td>
							<td>{{$value->price}}</td>
							<td>{{$value->quantity}}</td>
							<td>{{$value->minimum_req}}</td>
							<td>{{$value->created_at}}</td>
							<td>{{$value->updated_at}}</td>
							<td>{{$value->expiry_date}}</td>
							<td><a class="" href="#{{$value->id}}" data-target="" data-toggle="modal"><button class="btn btn-link" >Update</button></a> <a style="color: red;" href="delete_item?delete_item={{$value->id}}"><button style="color: red;" onclick="return confirm('Are you sure you want to delete this Item??');" class="btn btn-link ">Delete</button></a></td>
						</tr>
						<div class="modal fade" id="{{$value->id}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-head">
										 <button type="button" class="close" data-dismiss="modal">&times</button>
									</div>
									<div  class="modal-body">
										<form class="row"  action="add_product" method="post" enctype="multipart/form-data" accept-charset="utf-8" id="form">
						@csrf
						<div class="col-12"  style=""><h5 style="" class="text-center ">Update Product</h5></div>
							<div class="col-12">
							<div class="form-group">
							<label>Item Name</label>
							<input type="text" name="id"  placeholder="id" hidden="true" readonly="true" class="form-control" required="" value="{{$value->id}}">
							<input type="text" name="name"  placeholder="item_name" class="form-control" required="" value="{{$value->name}}">
						</div>
						<div class="form-group">
							<label>Item Price</label>
							<input type="number" name="price"  placeholder="item_price" class="form-control" required="" value="{{$value->price}}">
						</div>
						<div class="form-group">
							<label>new Stock Quantity</label>
							<input type="number" name="pieces"  placeholder="items Quantity eg 10" class="form-control" required="" value="">
						</div>
						</div>
						<div class="col-12">
							<div class="form-group">
							<label>Item Package</label>
							<input type="text" name="package"  placeholder="eg 1 kg" class="form-control" value="{{$value->package}}">
						</div>
						<div class="form-group">
							<label>Minimum Stock Expected</label>
							<input type="number" name="minimum" class="form-control" value="{{$value->minimum_req}}">
						</div>
							<div class="form-group">
							<label>Update Date</label>
							<input type="date" name="updated_at"  class="form-control" required=""value="{{$value->updated_at}}">
						</div>
						<div class="form-group">
							<label>Expiry Date</label>
							<input type="date" name="expiry_date" class="form-control" value="{{$value->expiry_date}}">
						</div>
						
						</div>
						<div class="col-12"><button class="btn btn-primary col-12 text-center" type="submit" >Update Item</button></div>
						
						
					</form>
									</div>
								</div>
							</div>
						</div>
							@endforeach
						
					</table>
					{{$stock->links()}}
					<div class=""><a href="new_product"><button style="float: right;" class="btn btn-secondary" onclick="">+ Add new Product</button></a></div>
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