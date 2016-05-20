
	<form method="post" action="">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<select class="form-control" size="1" name="course">
						<option>Select a course</option>
						<?php 
						include("includes/connect.php");
							if(isset($_GET['enrol'])){
								$get_course = "SELECT * FROM courses";
								$run_course = mysql_query($get_course);

								while($row_course = mysql_fetch_array($run_course)){
									$courseid = $row_course['course_id'];
									$coursetitle = $row_course['course_title'];
									echo "<option value='$courseid'>$coursetitle</option>"; 
								}
							}
						?>
						<!--Make this option to dynamically extract courses from the database-->
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-lg" name="uload">Enrol </button>
				</div>
			</div>
		</div>
		
	</form>


<?php
include("includes/connect.php");
	if(isset($_POST['uload'])){
		$courseid = $_POST['course'];
		//$coursetitle = $_POST['course'];
		$useremail = $_SESSION['email'];
		$get_sess = "SELECT * FROM users WHERE email = '$useremail'";
		$run_sess = mysql_query($get_sess);

		$row_sess = mysql_fetch_array($run_sess);
		$user_sessid = $row_sess['user_id'];
		$user_role = $row_sess['role'];

		$query = "SELECT * FROM enrol WHERE(user_id = '$user_sessid' AND course_id='$courseid')";
		$run = mysql_query($query);

		$check = mysql_num_rows($run);
		if($check > 0){
			echo "User has enroled for this course";
		}

		else {
			$insert = "INSERT INTO enrol(course_id, user_id, role) VALUES('$courseid', '$user_sessid', '$user_role')";
			$result = mysql_query($insert);

			/*if($result){
				echo "Values have been inserted";
			} */
		}
	}
	
?>