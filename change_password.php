<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="row">
		<div class="col-lg-5">
			<form method="post" action="" role="form">
				<div class="form-group">
					<input class="form-control" type="password" name="upassword" placeholder="Enter current password!!!"/>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="upassword1" placeholder="Enter new passsword!!!"/>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="upassword2" placeholder="Confirm new password!!!"/>
				</div>
				<div>
					<button class="btn btn-primary btn-lg" name="change">Change Password</button>
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>

<?php 
error_reporting(0);
include("../includes/connect.php");
if (isset($_SESSION['email']) || $_SESSION['email'] == '') {
	header("location: login.php");
}
	
	$uemail = $_SESSION['email'];
	$password = $_POST['upassword'];
	$password1 = $_POST['upassword1'];
	$password2 = $_POST['upassword2'];

if (isset($_POST['change'])) {
		if(!empty($password1)){
			if($password1 != $password2){
				echo "New password and Confirm password must match";
			}
			else{
				$np = mysql_real_escape_string(trim($password1));
			}
		}
		else{
			echo "Please enter your new password";
		}
		if (!empty($password1 && $password && $password2)) {
			$sel = "SELECT * FROM users WHERE(email = '$uemail' AND password='$password')";
			$query = mysql_query($sel);
			$nums = mysql_num_rows($query);

			if($nums == 1){
				$rows = mysql_fetch_array($query, MYSQL_NUM);

				$update = "UPDATE users SET password='$np' WHERE email='$uemail'";

				$result = mysql_query($update);

				if($result){
					
					echo "<script>alert('Successfully registered!!!')</script>";			
					header("location: home.php?change_password");
				}
				else{
					echo "Password couldnt be change!!!";
				}
				mysql_close();
			}
			else{
				echo "Email and password do not match";
			}

		}
	}
?>
