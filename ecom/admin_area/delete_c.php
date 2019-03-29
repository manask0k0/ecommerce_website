<?php
session_start();
if(!isset($_SESSION['user_email'])){

	echo "<script>window.open('login.php?not_admin=You are not an Admin','_self')</script>";
}

else{
	?>

<?php
	include("includes/db.php");

	if(isset($_GET['delete_c'])) {

		$delete_id = $_GET['delete_c'];

		$delete_c="DELETE FROM customers WHERE customer_id='$delete_id'";

		$run_delete = mysqli_query($con,$delete_c);

		if($run_delete) {

			echo "<script>alert('A Customer Has Been Deleted')</script>";
			echo "<script>window.open('index.php?view_customers','_self')</script>";

		}
	}
?>

<?php  } ?>