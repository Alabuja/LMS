<div class="row">
	<div class="col-md-7">
		<form action="" method="post">
			<div class="form-group">
				<select class="form-control" name="course">
					<option>Select a course</option>
						<?php 
							include("../includes/connect.php"); //call the connection to db
							
							/*Call the courses a lecturer has enrolled for*/
							$get_course = "SELECT * FROM enrol WHERE role='2' AND course_id != '0'";
							$run_course = mysql_query($get_course);

							while($row_course = mysql_fetch_array($run_course)){
								$courseid = $row_course['course_id'];
								$coursetitle = $row_course['course_title'];
								echo "<option value='$courseid'>$coursetitle</option>"; 
							}
						?>
				</select>
			</div>
			<div class="form-group">
				<input type="text" placeholder="Enter Question" name="question" class="form-control" required/>
			</div>
			<div class="form-group">
				<input type="text" placeholder="Enter option 1" name="option1" class="form-control" required/>
			</div>
			<div class="form-group">
				<input type="text" placeholder="Enter Option 2" name="option2" class="form-control" required/>
			</div>
			<div class="form-group">
				<input type="text" placeholder="Enter option 3" name="option3" class="form-control" required/>
			</div>
			<div class="form-group">
				<input type="text" placeholder="Enter Option 4" name="option4" class="form-control" required/>
			</div>
			<div class="form-group">
				<input type="text" placeholder="Enter Right Answer e.g option1 = 1; option2 = 2" name="right_ans" class="form-control" required/>
			</div>
			<div class="form--group">
				<button class="btn btn-primary btn-md" name="send_q">Submit</button>
			</div>
		</form>
	</div>
</div>
<?php 
include("../includes/connect.php");

if(isset($_POST['send_q'])){

	$course = $_POST['course'];
	$ques = $_POST['question'];
	$optn1 = $_POST['option1'];
	$optn2 = $_POST['option2'];
	$optn3 = $_POST['option3'];
	$optn4 = $_POST['option4'];
	$ans = $_POST['right_ans'];

	$query = "INSERT INTO question(course_id, question, option1, option2, option3, option4, right_answer) VALUES('$course', '$ques', '$optn1', '$optn2', '$optn3', '$optn4','$ans')";

	$result = mysql_query($query);

	if($result){
		echo "<script>alert('Question Successfully inserted')</script>";
	}
	else{
		die(mysql_error());
	}
}
?>