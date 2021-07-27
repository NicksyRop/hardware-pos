<div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
    	 @include('ui.page')
    	 <div class="container shadow p-3 mb-5 bg-white mt-5 rounded bg-light col-sm-12 col-md-12 col-lg-12">
    	 	<div class="row">
    	 		<div class="container mt-5">
    	 			<div class="row">
    	 				<div class="col-sm-6 col-md-3 col-lg-3">
    	 					<a href="stock" style="color: black;"><i class="fas fa-university fa-4x" aria-hidden="true"></i>
    	 						<p>Stock</p>
    	 					</a>
    	 					
    	 				</div>
    	 				<div class="col-sm-6 col-md-3 col-lg-3 sales">
    	 					<a href="sales" style="color: purple;"><i class="fas fa-chart-bar fa-4x" aria-hidden="true"></i>
    	 						<p>Sales</p></a>
    	 					
    	 				</div>
    	 				<div class="col-sm-6 col-md-3 col-lg-3">
    	 					<a href="point_of_sale"><i class="fas fa-cart-plus fa-4x" aria-hidden="true"></i>
    	 						<p>Point of Sale</p>
    	 					</a>
    	 					
    	 				</div>
    	 				<div class="col-sm-6 col-md-3 col-lg-3">
    	 					<a href="cart" class="text-success"><i class="fas fa-shopping-cart fa-4x" aria-hidden="true"></i>
    	 					<p>Current Cart</p>
    	 				</a>
    	 					
    	 				</div>
    	 			</div>
    	 		</div>
    	 		<div class="container">
    	 			<div class="row">
    	 				<div class="col-sm-6 col-md-3 col-lg-3 sales">
    	 					<a href="reports" style="color: #7FE2EA"><i class="fas fa-book fa-4x" aria-hidden="true"></i>
    	 					<p>Reports</p></a>
    	 					
    	 				</div>
    	 				<div class="col-sm-6 col-md-3 col-lg-3">
    	 					<a href="invoice" style="color: #6495ED"><i class="fas fa-inbox fa-4x" aria-hidden="true"></i>
    	 					<p>Send Invoices</p></a>
    	 				</div>
    	 				<div class="col-sm-6 col-md-3 col-lg-3 sales">
    	 					<a href="accounts" class="text-secondary"><i class="fas fa-users fa-4x" aria-hidden="true"></i>
    	 					<p>Accounts/Users</p></a>
    	 				</div>
    	 				<div class="col-sm-6 col-md-3 col-lg-3">
    	 					<a href="#" style="color: grey;"><i class="fas fa-cog fa-4x" aria-hidden="true"></i>
    	 					<p>Settings</p></a>
    	 				</div>
    	 				
    	 			</div>
    	 			
    	 		</div>
    	 	</div>
    	 </div>
					
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