<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");

?>
<html>
<head>
	<title>My Online Shop</title>


	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />
</head>
<body>


	<div class="main_wrapper">
		
		<div class="header_wrapper">

			<a href="../index.php"><img id="logo" src="images/logo.gif" alt="LOGO" /></a>
			<img id="banner" src="images/ad_banner.gif" alt="AD_BANNER" />
			

		</div>

<!--Navigation bar-->
			<div class="menubar">
				
				<ul id="menu">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../all_products.php">All Products</a></li>
					<li><a href="customer/my_account.php">My account</a></li>
					<li><a href="#">Sign up</a></li>
					<li><a href="cart.php">Shopping cart</a></li>
					<li><a href="#">Contact us</a></li>


				</ul>

				<div id="form">
					<form method="get" action="result.php" enctype="multipart/form-data">
						<input type="text" name="user_query"  placeholder="Search a Product" />
						<input type="submit" name="search" value="Search"  />
					</form>
				</div>
			</div>
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">My Account</div>
				<ul id="cats">
				
				<?php
				$user = $_SESSION['customer_email'];
				$get_img = "SELECT * FROM customers WHERE customer_email='$user'";
				$run_img = mysqli_query($con,$get_img);
				$row_img = mysqli_fetch_array($run_img);
				$c_image = $row_img['customer_image'];
				$c_name = $row_img['customer_name'];

				echo "<center><img src='customer_images/$c_image' width=100 height=100 /></center>";

				?>
					<li><a href="my_account.php?my_orders">My Orders</a></li>
					<li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change Password</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="logout.php">Log Out</a></li>
				
				</ul>
			</div>

			<div id="content_area">
				<?php cart();  ?>

				<div id="shopping_cart">
					
					<span style="float: right; font-size: 17px; padding: 5px; line-height: 40px;">

						<?php
						if(isset($_SESSION['customer_email']))
						{
							echo "<b>Welcome:</b>" . $_SESSION['customer_email']  ;
						}

						?>

					<?php
					if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='checkout.php'>LogIn</a>";
						}
					else
					{
						echo "<a href='logout.php'>LogOut</a>";
					}
					 ?>
				</span>
				</div>
				<!--<?php echo $ip=getIp();  ?> -->
				<div id="product_box" align="center">	
					<?php
					if(!isset($_GET['my_orders'])) {
						if(!isset($_GET['edit_account'])) {
							if(!isset($_GET['change_pass'])) {
								if(!isset($_GET['delete_account'])) {


								 	echo " <h2>Welcome: <?php echo $c_name; ?></h2><br>
								 	<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>Link</a></b>";
								}
							}
						}

					}
					?>

					<?php
					if(isset($_GET['edit_account'])) {
						include("edit_account.php");
					}

					if(isset($_GET['change_pass'])) {
						include("change_pass.php");
					}

					if(isset($_GET['delete_account'])) {
						include("delete_account.php");
					}

					?>
				</div>
			</div>
		</div>
		<!--footer area copyright claim etc...  -->	
		<div id="footer">
			<h2 style="text-align: center; padding-top: 30px;">&copy  2018 by wwww.moonlightstore.com</h2>
		</div>
</body>
</html>	