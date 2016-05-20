<form action="" method="post">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<input class="form-control" type="text" name="u_name" placeholder="Name" required/>
			</div>
			<div class="form-group">
				<input class="form-control" type="email" name="u_email" placeholder="Email" required/>
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="u_pass" placeholder="Password" required/>
			</div>

			<button class="btn btn-success btn-md" name="update">Update</button>
		</div>
	</div>
</form>

<?php
	include("../includes/connect.php");
	if(isset($_POST['update'])){
		$uu_name = $_POST['u_name'];
		$uu_email = $_POST['u_email'];
		$uu_pass = $_POST['u_pass'];

		$update = "UPDATE users SET name = '$uu_name', email='$uu_email', password='$uu_pass' WHERE user_id='$user_id'";

		$run = mysql_query($update);

		if($run){
			echo "<script>alert('Your profile is updated')</script>";
		echo "<script>window.open('home.php?edit-profile','_self')</script>";
		}
	}
?>