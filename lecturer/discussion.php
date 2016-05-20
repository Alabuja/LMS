<?php
$user_current = $_SESSION['email'];
$userid = "SELECT *FROM users WHERE role = 'Lecturer'";
$getid = mysql_query($userid);

while($row = mysql_fetch_row($getid)){

}
?>
<div class="row">
	<div class="col-md-5">
		<form action="" method="post">
			<div class="form-group">
				<select class="form-control" size="1" name="course">
					<?php 
						include("../includes/connect.php");
						$useremail = $_SESSION['email'];
						$get_sess = "SELECT * FROM users WHERE email = '$useremail'";
						$run_sess = mysql_query($get_sess);

						$row_sess = mysql_fetch_array($run_sess);
						$userid = $row_sess['user_id'];
						//$user_role = $row_sess['role'];

						$user_courses = "SELECT * FROM enrol WHERE user_id = '$userid' AND course_id != 0";
						$get_courses = mysql_query($user_courses);
						while ($run_courses = mysql_fetch_array($get_courses)) {
							//$coursetitle = $run_courses['course_title'];
							$courseid = $run_courses['course_id'];				
							/*Store in an array*/

							/*Get from courses for course_id*/

							$userc = "SELECT * FROM courses WHERE course_id = '$courseid'";
							$run_userc = mysql_query($userc); 
							$row_userc = mysql_fetch_array($run_userc);
							$courseTitle = $row_userc['course_title'];

							/*End for course_id*/

							echo "<option value='$courseid'>$courseTitle</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="discussion_topic" class="form-control" placeholder="Enter the topic" required/>
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="8" cols="20" name="discussion_content" placeholder="Enter post content" required></textarea>
			</div>

			<button class="btn btn-primary btn-sm" name="discuss">Post</button>
		</form>
	</div>
	<div class="col-md-7" style="padding-left: 100px;">
		<?php include("../topics.php");?>
	</div>
</div>

<?php 
	include("../includes/connect.php");
	if(isset($_POST['discuss'])){

		$topic = addslashes($_POST['discussion_topic']);
		$content = addslashes($_POST['discussion_content']);
		$course = $_POST['course'];

		/*Using the person currently loggedin get the user_id from users table*/
		$useremail = $_SESSION['email'];	
		$get_com = "SELECT * FROM users WHERE email = '$useremail'";
		$res_com = mysql_query($get_com);
		$row_com=mysql_fetch_array($res_com);
		$userid = $row_com['user_id'];
		/*end tthe getting from users table*/

		if(empty($content)){
			echo "<script>alert('Your discussion field cannot be empty')</script>";
		}

		/*Insert into the discussion table*/
		$insert = "INSERT INTO discussions(user_id,course_id, discussion_topic, discussion_content, date) VALUES('$userid','$course','$topic','$content',NOW())";
		$result = mysql_query($insert);

		if($result){
			echo "<script>alert('Discussion has been created!!!')</script>";
		} 
	}

?>