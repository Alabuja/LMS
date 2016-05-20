<?php 
	include("../includes/connect.php");
	if(isset($_GET['registered_courses'])){

		$useremail = $_SESSION['email'];
		$get_sess = "SELECT * FROM users WHERE email = '$useremail'";
		$run_sess = mysql_query($get_sess);

		$row_sess = mysql_fetch_array($run_sess);
		$userid = $row_sess['user_id'];
		$user_role = $row_sess['role'];

		$user_courses = "SELECT * FROM enrol WHERE user_id = '$userid' AND course_id != '0'";
		$get_courses = mysql_query($user_courses);
		while ($run_courses = mysql_fetch_array($get_courses)) {
			$coursetitle = $run_courses['course_title'];
			$courseid = $run_courses['course_id'];				
			/*Store in an array*/
			echo "<a href='home.php?single_note&course_id=$courseid'>". $coursetitle.", " ."</a>";	
		}
	}
?>