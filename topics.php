<?php 
//error_reporting(0);
include("includes/connect.php");
	if(isset($_GET['discussion'])){

		//Get user currently loggedin 

		$usere = $_SESSION['email'];
		$get_sess = "SELECT * FROM users WHERE email = '$usere'";
		$run_sess = mysql_query($get_sess);
		$row_sess = mysql_fetch_array($run_sess);
		$user_sessid = $row_sess['user_id'];

		/*end the session*/


		/*Get for user enrol to a course*/

		$user_enrol = "SELECT * FROM enrol WHERE user_id = '$user_sessid'";
		$run_enrol = mysql_query($user_enrol);
		while($row_enrol = mysql_fetch_array($run_enrol)){
			$enrol_id = $row_enrol['course_id'];

			/*End for user enrol*/


			$get_discuss = "SELECT * FROM discussions WHERE course_id = '$enrol_id' AND course_id != 0";
			$run_discuss = mysql_query($get_discuss);


		while($row_discuss = mysql_fetch_array($run_discuss)){
			$discussid = $row_discuss['discussion_id'];
			$userid = $row_discuss['user_id'];
			$courseid = $row_discuss['course_id'];
			$topic = $row_discuss['discussion_topic'];
			$content = $row_discuss['discussion_content'];
			$date = $row_discuss['date'];

			$user = "SELECT * FROM users WHERE user_id = '$userid'";
			$run_user = mysql_query($user);
			$row_user = mysql_fetch_array($run_user);
			$user_name = $row_user['name'];

			/*Get from courses for course_id*/

			$userc = "SELECT * FROM courses WHERE course_id = '$courseid'";
			$run_userc = mysql_query($userc); 
			$row_userc = mysql_fetch_array($run_userc);
			$courseTitle = $row_userc['course_title'];

			/*End for course_id*/


			//now displaying all at once 
			echo "			
				
				<h3>Started by: $user_name</h3> 
				<h4>$courseTitle</h4>
				<h5>$topic</h5>
				<p>$content</p>
				<p>$date</p>
				<a href='home.php?comments&discussion_id=$discussid' style='float:right;'><button class='btn btn-default btn-sm'>Comment on discussion</button></a>
			<br/><hr>";
		}
	}
	}
?>