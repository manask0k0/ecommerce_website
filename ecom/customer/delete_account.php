<h2 align="center">Do you really want to delete your account?</h2>


<form action="" method="post">
	<br>
	<input type="submit" name="yes" value="Yes I want.">
	<input type="submit" name="no" value="No I was joking!">
</form>


<?php
include("includes/db.php");

	$user = $_SESSION['customer_email'];

	if(isset($_POST['yes'])) {

		$delete_customer = "DELETE FROM customers WHERE customer_email='$user'";

		$run_customer = mysqli_query($con,$delete_customer);
		echo "<script>alert('Your account has been deleted successfully!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";

	}

	if(isset($_POST['no'])) {
		echo "<script>alert('Oh, don't joke again!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";		

	}



?>