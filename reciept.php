<?php
include("header.php");
?>


	<div class="mainpanel">	
		
		<div class="container mbottom20 items reciept">
			<div class="rows">
				<div class="col-lg-8">
					<p id="item">Item:</p>
					<p id="fname">First name:</p>
					<p id="lname">Last name:</p>
					<p id="address">Address:</p>
					<p id="qty">Quantity:</p>
					<p id="total">Total:</p>
					<a href="index.php" class="btn btn-success" >Back to Home</a>
				</div>
			</div>
		</div>
	
		
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
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		var item = vars[0].split("=");
		var fname = vars[1].split("=");
		var lname = vars[2].split("=");
		var address = vars[3].split("=");
		var qty = vars[4].split("=");
		var total = vars[5].split("=");
		document.getElementById('item').innerHTML = '<strong>Item: </strong>' + decodeURIComponent(item[1]);
		document.getElementById('fname').innerHTML = '<strong>First name: </strong>' + decodeURIComponent(fname[1]);
		document.getElementById('lname').innerHTML = '<strong>Last name: </strong>' + decodeURIComponent(lname[1]);
		document.getElementById('address').innerHTML = '<strong>Address: </strong>' + decodeURIComponent(address[1]);
		document.getElementById('qty').innerHTML = '<strong>Quantity: </strong>' + qty[1];
		document.getElementById('total').innerHTML = '<strong>Total: </strong>Php ' + total[1] + '.00';
	</script>
<?php
include("footer.php");
?>

	 
	 
	 
	 
	