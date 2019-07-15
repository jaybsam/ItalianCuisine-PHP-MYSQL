<?php 
include("config/settings.php");

if(isset($_GET['search'])){
	
	$search = $_GET['search'];
	$query = mysqli_query($conn, "SELECT * FROM products WHERE `name` LIKE '%" . $search. "%'");
}
else{
	header("Location: index.php");
}

include("search.php");
include("header.php");
?>

	<div class="mainpanel">	
		<div class="container">
		<div class ="row" style="text-align:left !important; padding-left: 158px;">
			<strong>Found <?php echo mysqli_num_rows($query); ?> results</strong>
		</div>
		</div>
<?php
		if($query->num_rows > 0) {
			while($row = mysqli_fetch_array($query)) {
			?>
		
		<div class="container mbottom20 items">
			<div class="rows">
				<div class="col-lg-4"><img src="<?php echo $row["image"]; ?>" class="img-responsive" /></div>
				<div class="col-lg-8"><h2><?php echo $row["name"]; ?></h2><p><?php echo $row["description"]; ?></p>
				<input type="submit" class="btn btn-success" value="Order Now" data-toggle="modal" data-target="#order<?php echo $row["id"]; ?>">

					<!-- Modal -->
					<div class="modal fade" id="order<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel1"><?php echo $row["name"]; ?></h4>
						  </div>
						  <div class="modal-body">
							<table class="checkouttable" cellpadding="0" padding="0" cellspacing="0">
								<tr>
									<td rowspan="6" width="200"><img src="<?php echo $row["image"]; ?>" class="img-responsive" width="350" height="260" /></td>
									<td><input type="text" id="txtfname1" class="form-control" placeholder="Please Enter your first name..."></td>
								</tr>
								<tr>
									<td><input type="text" id="txtlname1" class="form-control" placeholder="Please Enter your last name..."></td>
								</tr>
								<tr>
									<td><textarea id="txtaddress1" class="form-control" placeholder="Please Enter your address..." rows="3" cols="43"></textarea></td>
								</tr>
								<tr>
									<td><input type="number" id="txtqty1" value="1" onchange="updateqty(1)" min="1" max="50" class="form-control" placeholder="Please Enter quantity..."></td>
								</tr>
								
								<tr>
									<td align="right"><strong>Price:</strong>Php <p id="price1"><?php echo $row["price"]; ?></p></td>
								</tr>
								<tr>
									<td align="right"><strong>Total:</strong>Php <p id="total1"><?php echo $row["price"]; ?></p></td>
								</tr>
							</table>
						  </div>
						  <div class="modal-footer">
						  	<button type="button" class="btn btn-success" onclick="process(1)">Place Order</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						  </div>
						</div>
					  </div>
					</div>
					<!-- Modal -->
				</div>
			</div>
		</div>
		
		<?php }
			}		?>
		<div class="container">
			<div class="rows">
				<div class="col-lg-12">
					<hr>
					<p>Copyright &copy; All Rights Reserved 2015 </p>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function process(id)
		{
			var item = document.getElementById("myModalLabel" + id).innerHTML;
			var fname = document.getElementById("txtfname" + id).value;
			var lname = document.getElementById("txtlname" + id).value;
			var address = document.getElementById("txtaddress" + id).value;
			var qty = document.getElementById("txtqty" + id).value;
			var total = document.getElementById("total" + id).innerHTML;
			window.location = 'reciept.php?im=' + item + '&fn=' + fname + '&ln=' + lname + '&ad=' + address + '&qty=' + qty + '&tl=' + total ;
		}
		
		function updateqty(id)
		{
			var qty = document.getElementById("txtqty" + id).value;
			var price = document.getElementById("price" + id).innerHTML;
			var total = qty * price;
			document.getElementById("total" + id).innerHTML = total;
		}
	</script>
<?php
include("footer.php");
?>

