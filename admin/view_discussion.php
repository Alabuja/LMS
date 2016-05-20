<?php 
error_reporting(0);
    //include("../includes/connect.php");
	include("../includes/connect.php");
	global $discussid;
	if(isset($_GET['view'])){
		$gett_id = $_GET['view'];

		$view_users = "SELECT * FROM discussions WHERE discussion_id = '$gett_id'";
		$result_users = mysql_query($view_users);

		$row = mysql_fetch_array($result_users);
		$discussid = $row['discussion_id'];
		$userid = $row['user_id'];
		$courseid = $row['course_id'];
		$topic = $row['discussion_topic'];
		$content = $row['discussion_content'];
		$date = $row['date'];

		/*Get from courses for course_id*/

		$userc = "SELECT * FROM courses WHERE course_id = '$courseid'";
		$run_userc = mysql_query($userc); 
		$row_userc = mysql_fetch_array($run_userc);
		$courseTitle = $row_userc['course_title'];

		/*End for course_id*/

		$user = "SELECT * FROM users WHERE user_id = '$userid'";

		$run_user = mysql_query($user); 
		$row_user = mysql_fetch_array($run_user);
		$user_name = $row_user['name'];

		//now displaying all at once 
		echo "<div style= 'text-align: justify;'>		
				<h3>$user_name</h3>
				<h4>$courseTitle</h4>
				<p>$date</p>
				<p>$content</p><hr>
			</div>";
	}

	/*Comments function*/
	$get_id = $_GET['view'];

	$query = "SELECT * FROM comments WHERE discussion_id='$get_id' ORDER by 1 DESC";
	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result)) {
		$user_comment = $row['comment'];
		$commentid = $row['comment_id'];
		$id = $row['user_id'];

		/** trying to get the user form the users table with the id on the comments table*/
		$usercom = "SELECT * FROM users WHERE user_id = '$id'";

		$runuser = mysql_query($usercom); 
		$rowuser = mysql_fetch_array($runuser);
		$username = $rowuser['name'];

		echo "<div class='col-md-10 col-md-offset-1'><b>".
			$username."</b><br>". 
				$user_comment.
		"<a href='delete.php?delete=$commentid'><span class='glyphicon glyphicon-trash' aria-hidden='true' style='float: right;'></span></a></div>
		<br><hr>"; 
	}
?>
