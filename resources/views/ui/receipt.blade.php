
<div class="d-flex" id="wrapper">
    @include('ui.sidebar')
    <div id="page-content-wrapper">
         @include('ui.page')
             <div class="container" style="margin-top: 20px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            	 <li class="breadcrumb-item"><a href="shop">Shop</a></li>
                <li class="breadcrumb-item"><a href="cart">Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Receipt</li>
            </ol>
        </nav>
          <div class="container my-auto" >
    	<div class="row">
    		<div class="col-sm-12 col-lg-8 col-md-8 my-auto shadow p-3 mb-5 bg-white rounded bg-light" id="Receipt" style="height: 2480dpi; width: 1748dpi;">
    			<div><p><span style="color: black; font-weight: bold;font-size: 17px;" class="text-left">Date <?php
$t=time();
echo(date("Y-m-d",$t));
?> </span><span class="text-right" style="color: purple; font-weight: bold;font-size: 17px; width: 50%; float: right;">Bush Park Hardware</span></p></div>
    			<div><p><span class="my-auto text-right" style="color: blue; font-weight: bold;font-size: 15px; float: right;">
    			 <?php
$t=time();
echo("Receipt Number ".$t . "<br>");
?></span></p></div>
<input type="text" name="name" class="form-control mb-10" placeholder="customer name" style="margin: 10px;">

<table class="table table-striped table-bordered"><thead><th>Item Name</th><th>Price</th><th>Quantity</th><th>Sub-Total</th></thead>
@foreach($mycart as $key=> $val)
<tr>
<td>{{$val['name']}}</td>
<td>{{$val['price']}}</td>
<td>{{$val['quantity']}}</td>
<td><?php echo (int)($val['quantity'])*(int)($val['price']);?></td>
</tr>
@endforeach	
<tr>
	<td colspan="3">Total</td>
	<td>{{$total['total']}}</td>
</tr>
</table>
<p class="text-center " style="color: black;">
	Thank you and Welcome Again!
</p>
    		</div>
    		<div class="col-sm-12 col-lg-8 col-md-8" style="margin: 20px;">
    			<button style="float: right;" class="text-center btn btn-success" onclick="return printDiv();" type="button">print Receipt</button>
    		</div>
    	</div>
    </div>
    	
    <style type="text/css">
    	td{
    		color: black;
    	}
    </style>
    <script> 
        function printDiv() { 
            var divContents = document.getElementById("Receipt").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body >'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script> 
    </div>      
    </div>
  </div>
 
