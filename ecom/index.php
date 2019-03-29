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

			<a href="index.php"><img id="logo" src="images/logo.gif" alt="LOGO" /></a>
			<img id="banner" src="images/ad_banner.gif" alt="AD_BANNER" />
			

		</div>

<!--Navigation bar-->
			<div class="menubar">
				
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="all_products.php">All Products</a></li>
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
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
				

					<?php  getCats();  ?>

				</ul>
					<div id="sidebar_title">Brands</div>
				<ul id="cats">
					
					<?php  getBrands();  ?>



				</ul>


			</div>

			

			<div id="content_area">
				<?php cart();  ?>

				<div id="shopping_cart">
					
					<span style="float: right; font-size: 17px; padding: 5px; line-height: 40px;">

						<?php
						if(isset($_SESSION['customer_email']))
						{
							echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b>Your</b>" ;
						}

						else
						{
							echo "<b>Welcome Guest:</b>";
						}



						?>


					 <b style="color: yellow">Shopping Cart -</b> Total Items: <?php total_items();  ?> Total Price: <?php total_price();  ?><a href="cart.php" style="color: red"> Go To Cart</a>



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

				<div id="product_box">
					<?php getPro();   ?>
					<?php getCatPro();  ?>
					<?php getBrandPro(); ?>

				</div>


			</div>
		</div>




		<!--footer area copyright claim etc...  -->	

		<div id="footer">
			

			<h2 style="text-align: center; padding-top: 30px;">&copy  2018 by wwww.moonlightstore.com</h2>
		</div>


</body>
</html>