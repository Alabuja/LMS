
<?php
	include("../includes/connect.php");

	if(isset($_GET['delete'])){
		$get_id = $_GET['delete'];
		$delete = "DELETE FROM users WHERE user_id = '$get_id'";
		$run_delete = mysql_query($delete);

		$del_post = "DELETE FROM comments OR discussions WHERE user_id= '$get_id'";
		$run_post = mysql_query($del_post);
		//header("location: index.php?view_users");
		echo "<script>alert('User has been deleted')</script>";
		echo "<script>window.open('home.php?view_lecturers','_self')</script>";
	}

	if(isset($_GET['deletes'])){
		$get_id = $_GET['deletes'];
		$delete = "DELETE FROM users WHERE user_id = '$get_id'";
		$run_delete = mysql_query($delete);

		$del_post = "DELETE FROM comments OR discussions WHERE user_id= '$get_id'";
		$run_post = mysql_query($del_post);
		//header("location: index.php?view_users");
		echo "<script>alert('User has been deleted')</script>";
		echo "<script>window.open('home.php?view_students','_self')</script>";
	}
?>