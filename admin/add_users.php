<form role="form" method="post" action="">	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
		      	<input placeholder="Name" name="u_name" type="text" class="form-control" autofocus required>
		    </div>
		    <div class="form-group">
		        <input placeholder=" Enter your email" name="u_email" class="form-control" type="email" required>
		    </div>
		    <div class="form-group">
		        <input class="form-control" placeholder="Enter your password" name="u_password" type="password" required>
		    </div> 
		    <div class="form-group">
		      	<select name="role" class="form-control">
		      		<option>Select an option</option>
		       		<option value="Student">Student</option>
		       		<option value="Lecturer">Lecturer</option>
		       	</select>
		    </div>
		        
		    <button class="btn btn-md btn-success" name="sign_up">Add User</button>
		    
		</div>
	</div>
</form>

<br><br><br>

<!--Insert using CSV File-->
<form method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<input placeholder="Enter the students details using CSV" class="form-control" disabled/>
			</div>
			<div class="form-group">
				<input type="file" class="form-control" name="csvFile"/>
			</div>
			<button class="btn btn-md btn-success" name="csvUsers">Add CSV_USERS</button>
		</div>
	</div>
</form>

<?php 
	error_reporting(0);

	include("../includes/connect.php");
	if (isset($_POST['sign_up'])) {
		$username = $_POST['u_name'];
		$useremail = $_POST['u_email'];
		$userpassword = md5($_POST['u_password']);
		$userrole = $_POST['role'];

		$check_email = "SELECT * FROM users WHERE email='$useremail'";
		$run_email = mysql_query($check_email);
		$check = mysql_num_rows($run_email);

		if ($check == 1) {
			
			echo "<script>alert('This email is registered!!!')</script>";
			echo "<script>window.open('home.php?add_users', '_self')</script>";
		}
		if (strlen($userpassword) < 6) {
			echo "<script>alert('Password should be atleast 6 characters long!!!')</script>";
		}
		else{

			$insert = "INSERT INTO users(name, email, password, role) VALUES('$username', '$useremail', '$userpassword', '$userrole')";
			$result = mysql_query($insert);
			
			if ($result) {
				
				echo "<script>alert('Successfully registered!!!')</script>";			
				echo "<script>window.open('home.php?add_users', '_self')</script>";
			}					
		}
	}

	$UploadDirectory	= '../notes/'; //Upload Directory, ends with slash & make sure folder exist

	if(isset($_POST['csvUsers'])){

		if ($_FILES["csvFile"]["size"] > 0) {

			$newtemp = $_FILES["csvFile"]["tmp_name"];
			$handle = fopen($newtemp, "r");

			do { 
				$arr;
				$name = $arr[0];
		        $email= $arr[1];
		        $password = md5($arr[2]);
		        $role =$arr[3];

		        $csvquery = "SELECT * FROM users WHERE email = '$email'";
				$csvresult = mysql_query($csvquery);

				$csvcheck = mysql_num_rows($csvresult);

		        if ($csvcheck == 1) {
		        	echo "<script>alert('This email is registered!!!')</script>";
					echo "<script>window.open('home.php?add_users', '_self')</script>";
		        }
		        else{

			        $inser = "INSERT INTO users(name, email, password, role) VALUES ('$name', '$email', '$password', '$role') WHERE !empty(email)";
			        $csvres = mysql_query($inser);

			        	if($csvres){
							echo "<script>alert('Users inserted')</script>";
							echo "<script>window.open('home.php?add_users', '_self')</script>";
						}
						else{
							echo "<script>alert('Users not inserted')</script>";
							echo "<script>window.open('home.php?add_users', '_self')</script>";
						}
				} 
   			 } while ($arr = fgetcsv($handle,1000,",","'")); 
		}
	}
?>