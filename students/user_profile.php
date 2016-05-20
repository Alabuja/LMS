<?php 
error_reporting(0);
include("../includes/connect.php");
	if(isset($_GET['user_profile'])){
		$uemail = $_SESSION['email'];
		$view_users = "SELECT * FROM users WHERE email = '$uemail'";
		$result_users = mysql_query($view_users);

		$row = mysql_fetch_array($result_users , MYSQL_BOTH);
		$user_name= $row['name'];
		$user_email= $row['email'];
		$userid = $row['user_id'];
		echo "<div class='container'>
				  <div class='row'>
					 <div class='col-md-10'>".
						"<h2 style='text-transform: uppercase;'>".$user_name.'</h2>'.
					    $user_email."<br>".
					   	
					"</div>
				</div>
			</div>";
		$user_courses = "SELECT * FROM enrol WHERE user_id = '$userid' AND course_id != '0'";
		$get_courses = mysql_query($user_courses);
		while ($run_courses = mysql_fetch_array($get_courses)) {
			$coursetitle = $run_courses['course_title'];
							
			/*Store in an array*/
			echo "<div class='container'>
				  	<div class='row'>
						<div class='col-md-10'>".
						$coursetitle.", ".
						"</div>
					</div>
				</div>";		
		}
	}

?>