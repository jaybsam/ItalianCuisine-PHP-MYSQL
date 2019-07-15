<?php
include("config/settings.php");

?>

<?php
$querystringcategory = mysqli_query($conn, "SELECT * FROM `category`");
while($category = mysqli_fetch_array($querystringcategory)){
 ?>

<?php } ?>


	<?php
	if(isset($_GET["catid"])){
		$querystring = mysqli_query($conn, "SELECT * FROM `products` WHERE `categoryid` = " . $_GET["catid"]);
	}else{
		$querystring = mysqli_query($conn, "SELECT * FROM `products`");
	}
		
		
		while($row = mysqli_fetch_array($querystring)){
	?>

		<?php } ?>
	
</tbody>
</table>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>																					
<body>
<div class="container">
	<div class="row">
		
	</div>
	<html>
  <head>
  
    <meta charset="utf-8"/>
	<title>Italian Gratze Cuisine</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>

	<body>
<div class="header">
<img src="images/banner0.jpg" width="812px">
</div>
		
		<nav class="navbar navbar-default navbar-fixed-top">
		
						
							
					
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Foodiez</a>
        </div>
		
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
			<li><a href="products.php?c=1">Bread</a></li>
			<li><a href="products.php?c=2">Pizza</a></li>
			<li><a href="products.php?c=3">Pasta</a></li>
			<li><a href="products.php?c=4">Dessert</a></li>
			<li><a href="products.php?c=5">Chicken</a></li>
			<li><a href="contact.php">Contact us</a></li>
			<li><a href="about.php">About us</a></li>
          </ul>
		  <?php	
			include("Search.php");
				?>
		  <?php if(isset($_SESSION["key"])){ ?>
		  <p style=" font-size:15px; text-align:right; margin-top:6px;"><b><?php echo $_SESSION["username"]; ?> </b>
		  <a href="profile.php" style="padding-right: 20px;"><img src="images/default-user-profile-image.png" style="width:3%; "></a>
		  <a  class="btn btn-danger" href="logout.php">Logout</a></p>
		  <?php }else{ ?>
			<div class="btn01">
				<button type="button" class="btn btn-success" style="width:auto;" data-toggle="modal" data-target="#loginModal">Login</button>
				<a 	class="btn btn-primary" onclick="Login.html" data-toggle="modal" data-target="#registerModal">SignUp</a>
			</div>
			  
		  <?php } ?>
		  
		</div>

	</div><!--/.nav-collapse -->
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form action="login.php" method="post" style="width:500px; margin:0 auto; padding: 50px; text-align:center;">
			<h3 style="color:green"><b>FOODIEZ</b></h3><h3 style="color:red"><b>LOGIN</b></h3>
			<input class="form-control" type="text" name="username" placeholder="Enter Username.." /><br>
			<input class="form-control" type="password" name="password" placeholder="Enter Username.." /><br>
			<input class="btn btn-success" type="submit" value="Sign In" />
			<button  type="button" class="btn btn-primary" type="button"  data-dismiss="modal" class="cancelbtn">Cancel</button><br><br>
			
			<p>No Yet Registered? <a href="register.php" style="color:red; text-decoration:none;">Sign Up</a></p>
		</form>
      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form action="register.php" method="post" style="width:500px; margin:0 auto; padding: 50px; text-align:center;">
			<h3 style="color:green"><b>FOODIEZ</b></h3><h3 style="color:red"><b>Sign Up</b></h3>
			<input class="form-control" type="text" name="username" placeholder="Enter Username.." /><br>
			<input class="form-control" type="password" name="email" placeholder="Enter Email.." /><br>
			<input class="form-control" type="password" name="password" placeholder="Enter Password.." /><br>
			<input class="btn btn-danger" type="submit" value="Sign up" />
			<button  type="button" class="btn btn-primary" type="button"  data-dismiss="modal" class="cancelbtn">Cancel</button><br><br>
		</form>
      </div>

    </div>
  </div>
</div>
