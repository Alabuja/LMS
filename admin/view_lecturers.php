<table width="100%" class="table table-striped table-bordered">
	<tr>
		<th>S/N</th>
		<th>Name</th>
		<th>Email address</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
	<?php 
	    include("../includes/connect.php");
		$sel_users = "SELECT * FROM users WHERE role='Lecturer' ORDER BY 1 DESC";
		$result = mysql_query($sel_users);
		$i =0;

		while($row = mysql_fetch_array($result)){

			$user_id= $row['user_id'];
			$user_name= $row['name'];
			$user_email= $row['email'];
			$i++;
	?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $user_name; ?></td>
		<td><?php echo $user_email; ?></td>
		<td><a href="delete_user.php?delete=<?php echo $user_id;?>">Delete</a></td>
		<td><a href="home.php?views=<?php echo $user_id; ?>">View Profile</a></td>
	</tr>
	<?php } ?>
</table>
