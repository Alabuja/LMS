<table align="center" width="80%" border="1" class="table table-striped table-bordered">
	<tr>
		<th>S/N</th>
		<th>Name</th>
		<th>Email address</th>
	</tr>
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
<?php
	include("../includes/connect.php");
	//error_reporting(0);
	if(isset($_GET['course_id'])){

		$getid = $_GET['course_id'];
		$get_course = "SELECT * FROM enrol WHERE (course_id = '$getid' AND role='Student')";
		$run_course = mysql_query($get_course);
		$i =0;

		while($row_posts=mysql_fetch_array($run_course)){
		
			//$courseid = $row_posts['course_id'];
			$userid = $row_posts['user_id'];
			//$coursetitle = $row_posts['course_title'];

			$user = "SELECT * FROM users WHERE user_id = '$userid'";
			$run_user = mysql_query($user); 
			$row_user = mysql_fetch_array($run_user);
			$user_name = $row_user['name'];
			$useremail = $row_user['email'];
			$i++;

?>
<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo strtoupper($user_name); ?></td>
		<td><?php echo $useremail; ?></td>
		
	</tr>
	<?php } } ?>
</table>