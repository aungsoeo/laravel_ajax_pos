@extends('layouts.app') @section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">
function refreshTable(){
	  var j = 1;
	  $(".neworderbody tr").each(function(){
		    var row_no = $(this).find('#num').text();	
		     $(this).find('.no').text(j);	
		 	j++;
	});

}
	function totalAmount(){
		var t = 0;
		$('.amount').each(function(i,e){
			var amt = $(this).val()-0;
			t += amt;
		});
		$('.total').html(t);
	}
$(document).ready(function(){
	// add new row
	$('.add').click(function () {
		// alert('hi');
		// var product = $('.product_id').html();
		var n = ($('.neworderbody tr').length - 0) + 1;
		var tr = '<tr><td class="no">' + n + '</td>' + '<td><input type="text" class="form-control product_id" name="product_id[]">' + '</td>' +
			'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
		qty ') }}"></td>' +
			'<td><input type="text" class="price form-control" name="price[]" value="{{ old('
		price ') }}"></td>' +
			'<td><input type="text" class="dis form-control" name="dis[]"></td>' +
			'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
			'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
		$('.neworderbody').append(tr);
 			refreshTable();

	});
		
	// remove row
	$('.neworderbody').delegate('.delete', 'click', function () {
		var n = ($('.neworderbody tr').length - 0);
		if (n!=1) {
			$(this).parent().parent().remove();
		}
		 refreshTable();
		 totalAmount();
	});

	$('.neworderbody').delegate('.product_id', 'change', function () {
		var tr = $(this).parent().parent();
		var price = tr.find('.product_id option:selected').attr('data-price');
		tr.find('.price').val(price);
		
		var qty = tr.find('.qty').val() - 0;
		var dis = tr.find('.dis').val() - 0;
		var price = tr.find('.price').val() - 0;
	
		var total = (qty * price) - ((qty * price * dis)/100);
		tr.find('.amount').val(total);
		totalAmount();
	});

	$('.neworderbody').delegate('.qty , .price, .dis', 'keyup', function () {
		var tr = $(this).parent().parent();
		var no =tr.find('.no').val();
		var qty = tr.find('.qty').val() - 0;
		var dis = tr.find('.dis').val() - 0;
		var price = tr.find('.price').val() - 0;
		var total = (qty * price) - ((qty * price * dis)/100);
		tr.find('.amount').val(total);
		totalAmount();
	});

	// get and back money 
	$('.getmoney').change(function(){
		var total = $('.total').html();
		var getmoney = $(this).val();
		var t = getmoney - total;
		$('.backmoney').val(t).toFixed(2);
	});

	//subtoal discount and grandtoal
	var total = $('.total').val();
	$('.subtotal').html(total);	


});
</script>


<style>
.hidden{
  display : none;  
}

.show{
  display : block !important;
}
select.form-control.product_id {
    width: 150px;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Receiving  Items</div>
				<div class="panel-body">
					<form class="form-horizontal" id="yoyo" role="form" method="POST" action="{{ url('/orders') }}">
                        	{!! csrf_field() !!}
	                           <table class="table table-striped">
								<tr>
									<td>
										<div class="form-group">
						                            <label class="col-md-4 control-label"> Product Code</label>
												<div class="col-md-8">
						                               		 <input type="text" class="form-control" name="product_code" value="{{ old('location') }}" placeholder="Product Code">
						                            	</div>
						                       </div>
									</td>
									<td align="right">
										<input type="button" class="btn btn-lg btn-primary add" value="Add New">
									</td>
								</tr>
					     </table>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Discount</th>
									<th>Amount</th>
									<th>Delete</th>
									
								</tr>
							</thead>
							<tbody class="neworderbody">
								<tr>
									<td class="no">1</td>
									<td>
										<input type="text" name="product_name"
										class="form-control product_name" data-price="" >
									</td>
									<td>
										<input type="text" class="qty form-control" name="qty[]" value="{{ old('qty') }}">
									</td>
									<td>
										<input type="text" class="price form-control" name="price[]" value="{{ old('price') }}">
									</td>
									<td>
										<input type="text" class="dis form-control" name="dis[]">
									</td>
									<td>
										<input type="text" class="amount form-control" name="amount[]">
									</td>
									<td>
										<input type="button" class="btn btn-danger delete" value="x">
									</td>
								</tr>
							</tbody>
														<tfoot>
								<th colspan="6">Total:<b class="total">0</b></th>
							</tfoot>
						</table>					
				</div>	
			</div>
		</div>
			<!--  Right -->

		 <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Reciept</div>
                		<table class="table table-striped">
                			<tr>
                				<td>
                				      <div class="form-group">
			                            <label class="col-md-4 control-label"> Sale person:</label>
									<div class="col-md-8">
			                               		 <input type="text" class="form-control" name="sale_person" value="{{ old('location') }}" placeholder="Company Name">
			                            	</div>
			                        </div>						
						</td>
                			</tr>
					<tr>
						<td>
							<div class="form-group">
			                            <label class="col-md-4 control-label">Supplier:</label>
									<div class="col-md-8">
			                               		 <input type="text" class="form-control" name="cust_name" value="" placeholder="Supplier">
			                            	</div>
			                        </div>
						</td>
					</tr>
				</table>
<!-- 				<table class="table table-striped"  border="1px solid">
						<thead>
							<tr>
								<th>NO</th>
								<th>Item </th>
								<th>Qty</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>aa</td>
								<td>1</td>
								<td>200</td>
								<td>200</td>
							</tr>
							<tr>
								<td>2</td>
								<td>bb</td>
								<td>2</td>
								<td>300</td>
								<td>600</td>
							</tr>	
							<tr>
								<td>3</td>
								<td>cc</td>
								<td>1</td>
								<td>400</td>
								<td>400</td>
							</tr>					
						</tbody>
				</table> -->
				<hr>
				<table class="table table-striped " id="ctr_totaltbl">
					<tr >
						<div class="form-group">
		                            <label class="col-md-4 control-label">SubTotal:</label>
								<div class="col-md-8" >
		                               		 <input type="tex" name="subtotal" class="subtotal" value="" style="text-align: right;">
		                            	</div>
		                       </div>	
					</tr>
					<tr >
						<div class="form-group">
		                            <label class="col-md-4 control-label">Discount:</label>
								<div class="col-md-8" >
		                               		<input type="tex" name="discount" value=""  style="text-align: right;">
		                            	</div>
		                       </div>	
					</tr>
						<div class="form-group">
		                            <label class="col-md-4 control-label">Grand Total:</label>
								<div class="col-md-8" >
		                               		<input type="text" name="grand_total" class="total" value="" style="text-align: right;">
		                            	</div>
		                       </div>								
					</tr>

				</table>
				<hr>
				<div class="panel-body">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>
									<div class="form-group">
					                            <label class="col-md-4 control-label">Get Money:</label>
											<div class="col-md-8" >
					                               		<input type="text" class="getmoney form-control" style="text-align: right;" value="">
			                            			</div>
		                       			</div>	
								</td>								
							</tr>
							<tr>
								<td>
									<div class="form-group">
					                            <label class="col-md-4 control-label">Back Money:</label>
											<div class="col-md-8" >
					                               		<input type="text" class="backmoney form-control" style="text-align: right;" value="">
					                            	</div>
					                       </div>						    
								</td>
							</tr>
						</tbody>
				</table>
				</div>
				
					<div class="panel-body">
						<center>
							<input type="submit" class="btn btn-default btn-lg" name="save" value="Save">  
							<button type="button" id='hideshow' class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
							  Print
							</button>
						</center>
					</div>
            	</div>
		  </div>
		</form>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Reciept</h4>
			  </div>
			  <div class="modal-body">
				<div class="panel-body " id="toPrint">
					<table class="table table-striped" >
						<thead>
							<tr>
								<th>ID</th>
								<th>Order Amount </th>
								<th>Order Qty</th>
								<th>Unit Price</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>

							<li><b>Ordered by :</b> rhthththt</li><br>
					</table>

				 <a href="javascript:void(0);" class="btn btn-primary" id="printPage">Print</a> 

				</div>
			</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
			</div>
		  </div>
		</div>
		
	<!-- Row End -->
	
 <script lang='javascript'>
 $(document).ready(function(){
  $('#printPage').click(function(){
        var data = '<input type="button" value="Print this page" onClick="window.print()">';           
        data += '<div id="toPrint">';
        data += $('#toPrint').html();
        data += '</div>';

        myWindow=window.open('','','width=1200,height=1000');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    });
 });
 </script>
</div>

@endsection