<div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
    	 @include('ui.page')
					<div class="container col-sm-12 col-lg-12 col-md-12">
						<div class="row">
							<div class="col-sm-12 col-lg-9 col-md-9">
								<table class="table table-striped " id="table">
									<thead><th>Product name</th>
										<th class="">Quantity</th>
										<th class="">Price</th>
										<th class="">Discount</th>
										<th class="">Amount</th>
										<th class="">Action</th>
									</thead>
								</table>


							</div>
							<div class="col-sm-12 col-lg-3 col-md-3" style="">
								<table class="table table-striped container">

									<thead><th class="">Product Name</th>
										<th class="">Price</th>
									</thead>
									@foreach($stock as $key=>$value)
									<tr onclick="return add_pos('{{$value->name}}','{{$value->price}}','{{$value->id}}','{{$value->price}}','1')">
										<td class=" " >{{$value->name}}</td>
										<td class=" " >{{$value->price}}</td>
									</tr>
								@endforeach
								</table>
							</div>
						</div>
					</div>
    </div>
  </div>
<script type="text/javascript">
	var price1;
	function add_pos(name,price,id,total,qua){
		 price1=price;
		 amountid="a"+id;
		 priceid="p"+id;
		 quantityid="q"+id;
		var table=document.getElementById('table');
		var tr=document.createElement("tr");
		var td=document.createElement('td');
		td.innerText=name;
		tr.appendChild(td);
		var td1=document.createElement('td');
		var inpu=document.createElement('input');
		inpu.innerText=qua;
		inpu.setAttribute("id","q"+id);
		inpu.setAttribute("type","text");
		inpu.setAttribute("onchange",
			"SetDefault($(this).val(),price1,amountid,name);");
		inpu.setAttribute("onkeyup","this.onchange();");
		inpu.setAttribute("onpaste","this.onchange();");
		inpu.setAttribute("oninput","this.onchange();");
		td1.appendChild(inpu);
		tr.appendChild(td1);
		var td2=document.createElement('td');
		td2.setAttribute("id","p"+id);
		td2.innerText=price;
		tr.appendChild(td2);
		var td3=document.createElement('td');
		var input1=document.createElement('input');
		input1.setAttribute("id","d"+id);
		input1.setAttribute("onchange",
			"SetDefault1($(this).val());");
		input1.setAttribute("onkeyup","this.onchange();");
		input1.setAttribute("onpaste","this.onchange();");
		input1.setAttribute("oninput","this.onchange();");
		td3.appendChild(input1);
		tr.appendChild(td3);
		var td4=document.createElement('td');
		// var inputa=document.createElement('input');
		// inputa.innerHTML=total;
		//td4.appendChild(inputa);
		td4.setAttribute("type","text");
		td4.setAttribute("id",amountid);
		td4.innerText=total;
		tr.appendChild(td4);
		var td5=document.createElement('td');
		td5.setAttribute("onClick","return del()");
		var bt=document.createElement('button');
		bt.setAttribute("class","btn btn-danger");
		var p=document.createElement('p');
		bt.innerText="X";
		td5.appendChild(bt);
		tr.appendChild(td5);
		table.appendChild(tr);
	}
	function SetDefault(value,price1,amount){
		var newprice=value*price1;
		add_pos()

	}
	function SetDefault1(value){
		alert(value);

	}
	function del(){

	}

	</script>