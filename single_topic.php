<?php
include("includes/connect.php");
	if(isset($_GET['discussion_id'])){

		$getid = $_GET['discussion_id'];
		$getdiscuss = "SELECT * FROM discussions WHERE discussion_id = '$getid'";

		$rundiscuss = mysql_query($getdiscuss);
		$rowdiscuss = mysql_fetch_array($rundiscuss);

		$discussid = $row_discuss['discussion_id'];
		$userid = $row_discuss['user_id'];
		$courseid = $row_discuss['course_id'];
		$topic = $row_discuss['discussion_topic'];
		$content = $row_discuss['discussion_content'];
		$date = $row_discuss['date'];

		/*Get from courses for course_id*/

		$userc = "SELECT * FROM courses WHERE course_id = '$courseid'";
		$run_userc = mysql_query($userc); 
		$row_userc = mysql_fetch_array($run_userc);
		$courseTitle = $row_userc['course_title'];

		/*End for course_id*/

		$user = "SELECT * FROM users WHERE(user_id = '$userid' AND role='Lecturer')";

		$run_user = mysql_query($user); 
		$row_user = mysql_fetch_array($run_user);
		$user_name = $row_user['name'];

		//now displaying all at once 
		echo "		
			<h3>$user_name</h3> 
			<h4>$courseTitle</h4>
			<p>$content</p>
			<p>$date</p>
		"; 
		include("comments.php");
	}

?>