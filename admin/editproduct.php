<?php
include("../config/settings.php");

//on post
if(!empty($_POST)){
	$id = $_POST["id"];
	$name = $_POST["name"];
	$price = $_POST["price"];
	$description = $_POST["description"];
	$image = $_FILE["name"];
	
	if($name == "" || $price == "" || $description == ""){
		header("Location: editproduct.php?id=".$id."&error");
		die();
	}
	
	$query = "UPDATE `products` SET `name` = '".$name."', `description` = '".$description."', `price` = '".$price."' WHERE `id` = " . $id;
	if(mysqli_query($conn, $query)){
		header("Location: editproduct.php?id=".$id."&saved");
		die();
	}
	else{
		header("Location: editproduct.php?id=".$id."&error");
		die();
	}
}

//page load normal
if(!isset($_GET["id"])){
	header("Location: index.php");
	die();
}
	else{
	$id = $_GET["id"];
	$query = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` = " . $id);
	$data = mysqli_fetch_array($query);
}

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

    <title>Jumbotron Template for Bootstrap</title>

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
          <a class="navbar-brand" href="#">Foodies CMS</a>
        </div>
      </div>
    </nav>
	
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6" style="padding-top: 100px;">
			<?php if(isset($_GET["saved"])){?>
			<div class="alert alert-success" role="alert"> <strong>Success!</strong> Product has been updated. </div>
			<?php } ?>
			
			<?php if(isset($_GET["error"])){?>
			<div class="alert alert-danger" role="alert"> <strong>Failed!</strong> Please fill up all fields. </div>
			<?php } ?>
		
			<h2>Edit Product</h2>
			<form action="editproduct.php" method="post">
			<div class="form-group">
				<label>Product Name: </label>
				<input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
				<input type="text" class="form-control" name="name" value="<?php echo $data["name"]; ?>">
			</div>
			<div class="form-group">
				<label>Price:</label>
				<div class="input-group">
				  <div class="input-group-addon">P</div>
				  <input type="text" class="form-control" name="price" value="<?php echo $data["price"]; ?>">
				</div>
			</div>
			<div class="form-group">
				<label>Description: </label>
				<textarea name="description" style="margin: 0px; width: 556px; height: 222px;"><?php echo $data["description"]; ?></textarea>
			</div>
			<div class="form-group">
				<label>Product Image: </label>
				<input type="file" name="image" class="form-control">
				<img src="../<?php echo $data["image"]; ?>">	
			</div>
			<div class="form-group">
				<input type="submit" value="Save" class="btn btn-info pull-right">
			</div>
			</form>
        </div>
      </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
