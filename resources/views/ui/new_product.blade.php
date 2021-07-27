<div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
    	 @include('ui.page')

					<div class="container">
						<div class="row">
							<div style="margin-top: 10px;" class="col-sm-12 col-lg-12 col-md-12 shadow p-3 mb-5 bg-white rounded bg-light">
					<form class="row"  action="add_product" method="post" enctype="multipart/form-data" accept-charset="utf-8" id="form">
						@csrf
						<div class="col-12"  style="background-color:blue;"><h5 style="color: white;" class="text-center ">Add New Product</h5></div>
							<div class="col-4">
							<div class="form-group">
							<label>Item Name</label>
							<input type="text" name="name"  placeholder="item_name" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Item Price</label>
							<input type="number" name="price"  placeholder="item_price" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Stock Quantity</label>
							<input type="number" name="pieces"  placeholder="items Quantity eg 10" class="form-control" required="">
						</div>
						</div>
						<div class="col-4">
							<div class="form-group">
							<label>Item Package</label>
							<input type="text" name="package"  placeholder="eg 1 kg" class="form-control">
						</div>
							<div class="form-group">
							<label>Entry Date</label>
							<input type="date" name="created_at"  class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Expiry Date</label>
							<input type="date" name="expiry_date" class="form-control" >
						</div>
						
						</div>
						<div class="col-4">
							<div class="form-group">
							<label>Minimum stock expected</label>
							<input type="number" name="minimum"  placeholder="eg 30 " class="form-control">
						</div>
							
						</div>
						<div class="col-8"><button class="btn btn-primary col-4 text-center" type="submit" >+ Add Item</button></div>
						
						
					</form>
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