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
						<thead>
							   <th>Name</th>
							   <th>Contact</th>
							   <th>Username</th>
							   <th>Password</th>
							   <th>Permission</th>
							   <th>Created At</th>
							   <th colspan="2" class="text-center">Action</th>
						</thead>
							@foreach($users as $key=>$value)
							<tr>
							<td>{{$value->name}}</td>
							<td>{{$value->contact}}</td>
							<td>{{$value->username}}</td>
							<td>{{$value->password}}</td>
							<td>{{$value->permission}}</td>
							<td>{{$value->date}}</td>
							<td><a class="" href="#{{$value->username}}" data-target="" data-toggle="modal"><button class="btn btn-link" >Update</button></a> <a style="color: red;" href="delete_user?delete_user={{$value->username}}"><button style="color: red;" onclick="return confirm('Are you sure you want to delete User??');" class="btn btn-link ">Delete</button></a></td>
						</tr>
						<div class="modal fade" id="{{$value->username}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-head">
										 <button type="button" class="close" data-dismiss="modal">&times</button>
									</div>
									<div  class="modal-body">
										<form class="row"  action="update_user" method="post" enctype="multipart/form-data" accept-charset="utf-8" id="form">
						@csrf
						<div class="col-12"  style="background-color:blue;"><h5 style="color: white;" class="text-center ">Update User</h5>
						</div>
							<div class="col-12">
							<div class="form-group">
							<label>Name</label>
							<input type="text" name="name"  placeholder="name" class="form-control" required="" minlength="5" value="{{$value->name}}">
						</div>
						<div class="form-group">
							<label>Mobile/Contact</label>
							<input type="number" name="contact"  placeholder="07.." class="form-control" value="{{$value->contact}}" required="" minlength="10">
						</div>
						<div class="form-group">
							<label>Username/Employee_no</label>
							<input type="text" name="username"  placeholder="employee number" readonly="true" value="{{$value->username}}" class="form-control" required="" minlength="3">
						</div>
						</div>
						<div class="col-12">
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
							<input type="text" name="password" value="{{$value->password}}" class="form-control" required="" minlength="6">
						</div>
						<div class="form-group">
							<label>Update Date</label>
							<input type="date" name="date" class="form-control" required="" >
						</div>
						
						</div>
						<div class="col-12 text-right"><button class="btn btn-primary col-4 text-center" type="submit" >Update Details</button></div>
						
						
					</form>
									</div>
								</div>
							</div>
						</div>
							@endforeach
						
					</table>
					{{$users->links()}}
					<div class=""><a href="new_user"><button style="float: right;" class="btn btn-secondary" onclick="">+ Add new User</button></a></div>
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