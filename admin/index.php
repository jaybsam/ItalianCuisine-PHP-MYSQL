<?php
include("../config/settings.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Italian Cuisine</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Foodies CMS</a>
        </div>
      </div>
    </nav>
	
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
			<h2 style="margin-top: 100px; display:inline-block;">Product List</h2>
			<a href="addproduct.php" style="display:inline-block;margin-bottom: 17px;margin-left: 20px;" class="btn btn-success">Add Product</a>
			<table class="table table-striped">
				<thead>
				  <tr>
					<th>Product Name</th>
					<th>Price</th>
					<th></th>
				  </tr>
				</thead>
				<tbody>
				<?php 
					$query = mysqli_query($conn, "SELECT * FROM `products`");
					while($row = mysqli_fetch_array($query)) {
				?>
				  <tr>
					<td><?php echo $row["name"]; ?></td>
					<td><?php echo $row["price"]; ?></td>
					<td><a href="editproduct.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning">Edit</a></td>
					<td>
						<a class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row["id"]; ?>">Delete</a>
						<!-- Modal -->
						<div class="modal fade" id="delete<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
							  </div>
							  <div class="modal-body">
								Are you sure you want to delete <strong><?php echo $row["name"]; ?></strong>?
							  </div>
							  <div class="modal-footer">
								<a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							  </div>
							</div>
						  </div>
						</div>
					</td>
				  </tr>
				<?php } ?>
				</tbody>
			</table>
        </div>
      </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
