<div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
    	 @include('ui.page')
    	 	<div class="container">
						<div class="row">
							<div style="margin-top: 10px;" class="col-sm-12 col-lg-12 col-md-12 shadow p-3 mb-5 bg-white rounded bg-light">
								@if(session('newmess'))
							<div class="alert alert-success">
							  {{session('newmess')}}
							</div>
							@endif
					<form class="row"  action="add_user" method="post" enctype="multipart/form-data" accept-charset="utf-8" id="form">
						@csrf
						<div class="col-12"  style="background-color:blue;"><h5 style="color: white;" class="text-center ">Add New User</h5>
						</div>
							<div class="col-6">
							<div class="form-group">
							<label>Name</label>
							<input type="text" name="name"  placeholder="name" class="form-control" required="" minlength="5">
						</div>
						<div class="form-group">
							<label>Mobile/Contact</label>
							<input type="number" name="contact"  placeholder="07.." class="form-control" required="" minlength="10">
						</div>
						<div class="form-group">
							<label>Username/Employee_no</label>
							<input type="text" name="username"  placeholder="employee number" class="form-control" required="" minlength="3">
						</div>
						</div>
						<div class="col-6">
							<div class="form-group">
							<label>Permission</label>
							<select name="permission" class="form-control">
								<option selected="selected">select user permission</option>
								<option value="salesperson">Sales Person</option>
								<option value="subadmin">Sub-Admin</option>
								<option value="superadmin">Super-Admin</option>
							</select>
						</div>
							<div class="form-group">
							<label>Password</label>
							<input type="text" name="password"  class="form-control" required="" minlength="6">
						</div>
						<div class="form-group">
							<label>Created Date</label>
							<input type="date" name="date" class="form-control" required="" >
						</div>
						
						</div>
						<div class="col-12 text-right"><button class="btn btn-primary col-4 text-center" type="submit" >+ Add User</button></div>
						
						
					</form>
							</div>
						</div>
					</div>	
    </div>
  </div>
  <script type="text/javascript">
  	$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});
  </script>
