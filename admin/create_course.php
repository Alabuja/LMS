	<div class="row">
		<form role="" method="post" action="">
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Please create a new course" disabled/>
				</div>		
				<div class="form-group">
					<input type="text" name="course" class="form-control" placeholder="Enter course title"/>
				</div>

				<div class="form-group">
		            <button class="btn btn-default btn-sm" name="create">Create a course</button>
		        </div>
			</div>
		</form>
	</div>


	<?php
		
		include("../includes/connect.php");
		if (isset($_POST['create'])) {
			$userCourse = $_POST['course'];

			$check_course = "SELECT * FROM courses WHERE(course_title='$userCourse')";
			$run_check = mysql_query($check_course);
			$result = mysql_num_rows($run_check);

			if($result > 0){
				echo "<script>alert('The course has already been created')</script>";
				echo "<script>window.open('home.php?create_course', '_self')</script>";
			}
			
			else{

				$getLecturer = "INSERT INTO courses(course_title) VALUES('$userCourse')";
				$runLecturer = mysql_query($getLecturer);

				if($runLecturer){
					echo "<script>alert('Course has been created and inserted!!!')</script>";
					echo "<script>window.open('home.php?create_course', '_self')</script>";
				}
				else{
					echo "<script>alert('Error and did not insert!!!')</script>";
				}
			}
		}
	?>