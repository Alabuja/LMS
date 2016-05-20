<table width="100%" class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Course Title</th>
		<th>Topic</th>
		<th>Content</th>
		<th>Date</th>
		<th>View</th>
		<th>Delete</th>
	</tr>
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
<?php 
error_reporting(0);
include("../includes/connect.php");
	if(isset($_GET['discussion'])){

		$get_discuss = "SELECT * FROM discussions";
		$run_discuss = mysql_query($get_discuss);

		while($row_discuss = mysql_fetch_array($run_discuss)){
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


			$user = "SELECT * FROM users WHERE user_id = '$userid'";
			$run_user = mysql_query($user); 
			$row_user = mysql_fetch_array($run_user);
			$user_name = $row_user['name'];
			
?>
			<!--now displaying all at once-->
			<tr align="center">
				<td><?php echo $user_name; ?></td>
				<td><?php echo $courseTitle; ?></td>
				<td><?php echo $topic; ?></td>
				<td><?php echo $content; ?></td>
				<td><?php echo $date; ?></td>
				<td><a href="home.php?view=<?php echo $discussid;?>">View</a></td>
				<td><a href="delete_discussion.php?delete=<?php echo $discussid;?>">Delete</a></td>
			</tr>

	<?php } }?>
</table>