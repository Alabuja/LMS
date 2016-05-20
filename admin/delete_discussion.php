
<?php
	include("../includes/connect.php");

	if(isset($_GET['delete'])){
		$get_id = $_GET['delete'];
		$delete = "DELETE FROM discussions WHERE discussion_id = '$get_id'";
		$run_delete = mysql_query($delete);

		//header("location: index.php?view_users");
		echo "<script>alert('Discussion has been deleted')</script>";
		echo "<script>window.open('home.php?discussion','_self')</script>";
	}
?>