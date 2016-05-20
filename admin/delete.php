<?php 
include("../includes/connect.php");
if(isset($_GET['delete'])){
	$del = $_GET['delete'];

	$delete = "DELETE FROM comments WHERE comment_id = '$del'";
	$run_delete = mysql_query($delete);
	/*$get_discuss = "SELECT * FROM discussions";
	$run_discuss = mysql_query($get_discuss);

	$row_discuss = mysql_fetch_array($run_discuss);
	$discussid = $row_discuss['discussion_id'];*/

	echo "<script>alert('Comment has been deleted')</script>";
	echo "<script>window.open('home.php?discussion','_self')</script>";
	}
?>