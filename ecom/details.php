<!DOCTYPE html>
<?php

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

			<img id="logo" src="images/logo.gif" alt="LOGO" />
			<img id="banner" src="images/ad_banner.gif" alt="AD_BANNER" />
			

		</div>

<!--Navigation bar-->
			<div class="menubar">
				
				<ul id="menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">All Products</a></li>
					<li><a href="#">My account</a></li>
					<li><a href="#">Sign up</a></li>
					<li><a href="#">Shopping cart</a></li>
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

				<div id="shopping_cart">
					
					<span style="float: right; font-size: 18px; padding: 5px; line-height: 40px;">
							Welcome Guest! <b style="color: yellow">Shopping Cart -</b> Total Items: Total Price: <a href="cart.php" style="color: red">Go To Cart</a>



					</span>
				</div>

				<div id="products_box">
			
<?php

		if(isset($_GET['pro_id'])){

			$product_id = $_GET['pro_id'];
		$get_pro = "SELECT * FROM products WHERE product_id='$product_id'";
		$run_pro = mysqli_query($con,$get_pro);

		while ($row_pro=mysqli_fetch_array($run_pro)) {

			$pro_id = $row_pro['product_id'];
			$pro_desc = $row_pro['product_desc'];
			$pro_title = $row_pro['product_title'];
			$pro_price = $row_pro['product_price'];
			$pro_image = $row_pro['product_image'];

			echo "<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='400' height='380'  />
					<p><b> Rs. $pro_price</b></p>
					<p>$pro_desc</p>

					<a href='index.php' style='float:left;'>Go Back</a>
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add To Cart</button></a>


					</div>


					";
		}
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