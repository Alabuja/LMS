<?php
include("includes/connect.php");

	if(isset($_GET['discussion_id'])){

		$getid = $_GET['discussion_id'];
		$getdiscuss = "SELECT * FROM discussions WHERE discussion_id = '$getid'";

		$rundiscuss = mysql_query($getdiscuss);
		$row_discuss = mysql_fetch_array($rundiscuss);

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
		echo "<div style= 'text-align: justify;'>		
			<h3>$user_name</h3>
			<h4>$courseTitle</h4> 
			<p>$date</p>
			<p>$content</p><hr>
			</div>
		";
	}

	/*Comments function*/
	$get_id = $_GET['discussion_id'];

	$query = "SELECT * FROM comments WHERE discussion_id='$get_id' ORDER by 1 DESC";
	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result)) {
		$user_comment = $row['comment'];
		$id = $row['user_id'];

		/** trying to get the user form the users table with the id on the comments table*/
		$usercom = "SELECT * FROM users WHERE user_id = '$id'";

		$runuser = mysql_query($usercom); 
		$rowuser = mysql_fetch_array($runuser);
		$username = $rowuser['name'];

		echo "<div class='col-md-7'><b>".
			$username."</b><br>". 
				$user_comment.
		"</div>
		<br><hr>"; 
	}

?>
<form method="post" action="">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<textarea name="u_comment" class="form-control" cols="15" rows="8" placeholder="Enter your comment"></textarea>
			</div>
		</div>
	</div>
	<button class="btn btn-primary btn-sm" name="send">Comment</button>
</form>

<?php 
	include("includes/connect.php");
	if(isset($_POST['send'])){

		$user_comment = addslashes($_POST['u_comment']);
		$useremail = $_SESSION['email'];

		$get_com = "SELECT * FROM users WHERE email = '$useremail'";
		$res_com = mysql_query($get_com);
		$row_com=mysql_fetch_array($res_com);
		$userid = $row_com['user_id'];

		$insert = "INSERT INTO comments(discussion_id, user_id, comment) VALUES('$discussid', '$userid', '$user_comment')";
		$result = mysql_query($insert);
		if ($result) {
			echo "<script>alert('You have successfully commented')</script>";
		}
	}
?>
