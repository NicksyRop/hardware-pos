<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
   <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
   <script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
   
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/start/jquery-ui.css"
    rel="stylesheet" type="text/css" />
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
						<div class="row" >
							<div class="col-sm-12 col-lg-12 col-md-12" style="height: 80vh;overflow: scroll;"  >
								<div class="container col-12"><div class="row"><input type="search" name="search" id="search" class="form-control mt-2 col-8" placeholder="search here">
								<button class="btn btn-secondary col-3 ml-2" onclick="CreatePDFfromHTML();">Export</button></div></div>
									<div class="div1"><table class="table table-striped" id="table"  >
						<thead>
							   <th>Sales_Id</th>
							   <th colspan="4" class="text-center">Products</th>
							   <th>Total Amount</th>
							   <th>Sales Date</th>
							  
						</thead>
							@foreach($sales as $key=>$value)
							<tr>
							<td>{{$value->sale_id}}</td>
							<td colspan="4">
								<table class="table table-striped col-12"><thead><th>name</th><th>price</th><th>quantity</th><th>subTotal</th></thead>
									<?php
							           $products=$value->products;
							           $mystaring=rtrim($products,'*');
							           $product=explode('*',$mystaring);
									$arr=array();
									 for ($i=0; $i <count($product); $i++) { 
                                     $products=explode('/', $product[$i]);
                                     $arr=$products;
                                     ?>
                                     <tr>
							           <td><?php echo $arr[0];?></td>
							           <td><?php echo $arr[1];?></td>
							           <td> <?php echo $arr[2];?></td>
							           <td> <?php echo $arr[3];?></td>
							           </tr>
                                     <?php
                                     
							           }
							          
									?>
									

								</table>
							</td>
							<td>{{$value->total}}</td>
							<td>{{$value->dates}}</td>
						</tr>
							@endforeach
					</table></div>
								
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
		function CreatePDFfromHTML() {
    var HTML_Width = $(".div1").width();
    var HTML_Height = $(".div1").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".div1")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Your_PDF_Name.pdf");
        //$(".div1").hide();
    });
}
	</script>