<table width="100%" class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Email address</th>
		<th>Courses Registered</th>
	</tr>
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
<?php 
error_reporting(0);
    //include("../includes/connect.php");
	include("../includes/connect.php");
	if(isset($_GET['views'])){
		$gett_id = $_GET['views'];
		$view_users = "SELECT * FROM users WHERE user_id = '$gett_id'";
		$result_users = mysql_query($view_users);

		$row = mysql_fetch_array($result_users , MYSQL_BOTH);
		$user_id= $row['user_id'];
		$user_name= $row['name'];
		$user_email= $row['email'];

?>
		<tr align="center">
			<td><?php echo $user_name; ?></td>
			<td><?php echo $user_email; ?></td>
			<td>
				<?php
					$query = "SELECT * FROM enrol WHERE user_id = '$user_id' AND course_id != 0";
					$run = mysql_query($query);
					while($row_s = mysql_fetch_array($run)){
						$courseid = $row_s['course_id'];

						$cquery = "SELECT * FROM courses WHERE course_id = '$courseid'";
						$cresult = mysql_query($cquery);
						$c_row = mysql_fetch_array($cresult);
						$courseTitle = $c_row['course_title'];
						echo $courseTitle, '<br>';
					}
				?>
			</td>
		</tr>

<?php	}

?>