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




						<b style="color: yellow">Shopping Cart -</b> Total Items: <?php total_items();  ?> Total Price: <?php total_price();  ?><a href="index.php" style="color: red">Back to Shop</a>


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
					<form action="" method="post" enctype="multipart/form-data">
						<table align="center" width="700" bgcolor="red">
							<tr align="center">
								<th>Remove</th>
								<th>Product(s)</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>

							<?php
							$total=0;
							global $con;
						
							$ip = getIp();
							$sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
							$run_price = mysqli_query($con,$sel_price);
						while ($p_price=mysqli_fetch_array($run_price))
	 				{
						$pro_id = $p_price['p_id'];
						$pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";
						$run_pro_price = mysqli_query($con,$pro_price);
							while ($pp_price = mysqli_fetch_array($run_pro_price))
		 						{	
		 								$product_price = array($pp_price['product_price']);
		 								$product_title = $pp_price['product_title'];
		 								$product_image = $pp_price['product_image'];
		 								$single_price = $pp_price['product_price'];
		 								$values = array_sum($product_price);
		 								$total+=$values;
							?>

							<tr align="center">
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>" /></td>
								<td><?php echo $product_title; ?><br>
								<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"  />
								</td>
								<td><input type="text" size="4" name="qty" value="<?php if(isset($_SESSION['qty'])){ echo $_SESSION['qty'];} ?>"></td>
								<?php
								if (isset($_POST['update_cart']))
								 {
									$qty = $_POST['qty'];
									$update_qty  = "UPDATE cart SET  qty='$qty'";
									$run_qty = mysqli_query($con,$update_qty);
									$_SESSION['qty']=$qty;

									$total =$total*$qty;
								}
								?>


								<td><?php echo "Rs. ".$single_price; ?></td>
							</tr>
					<?php } } ?>
					<tr align="right">
								<td colspan="4"><b>Sub Total:</b></td>
								<td><?php echo "Rs. ".$total;?></td>
							</tr>
							<tr align="center">
								<td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
								<td><input type="submit" name="continue" value="Continue Shopping" /></td>
								<td><button><a href="checkout.php" style="text-decoration: none;color: black;">Checkout</a></button></td>
							</tr>
					</table>
					</form>
		<?php
			global $con;
			$ip = getIp();
			if (isset($_POST['update_cart']))
			 {
			 	if(isset($_POST['remove']))
			 	{
				foreach ($_POST['remove'] as $remove_id)
				 {
					$delete_product = "DELETE FROM cart WHERE p_id='$remove_id' AND  ip_add='$ip'";
					$run_delete = mysqli_query($con,$delete_product);

					if ($run_delete) {
						echo "<script>window.open('cart.php','_self')</script>";
					}
				}
			}
		}

			if (isset($_POST['continue'])) {
				echo "<script>window.open('index.php','_self')</script>";
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