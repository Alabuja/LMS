<?php 
error_reporting(0);
include("../includes/connect.php");
	if(isset($_GET['user_profile'])){
		$uemail = $_SESSION['admin_email'];
		$view_users = "SELECT * FROM admin WHERE admin_email = '$uemail'";
		$result_users = mysql_query($view_users);

		$row = mysql_fetch_array($result_users , MYSQL_BOTH);
		$user_name= $row['admin_name'];
		$user_email= $row['admin_email'];
		$userid = $row['admin_id'];
		echo "<div class='container'>
				  <div class='row'>
					 <div class='col-md-10'>".
						"<h2 style='text-transform: uppercase;'>".$user_name.'</h2>'.
					    $user_email."<br>".
					   	
					"</div>
				</div>
			</div>";
	}

?>