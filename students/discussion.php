<?php
	
	include("../includes/connect.php");
	$query = "SELECT * FROM comments";
	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result)) {
		$userid = $row['user_id'];

		/*Displays the user name*/
		$query2 = "SELECT * FROM users WHERE user_id = '$userid'";
		$result2 = mysql_query($query2);
		while ($row2 = mysql_fetch_array($result2)) {
			$name = $row2['name'];

		}
		$usercomment = $row['comment'];

		echo "<div class='col-md-7'><b>".
				$name."</b><br>". $usercomment.
		"</div>
		<br><hr>"; 
	}

?>

<form method="post" action="">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<textarea name="comment" class="form-control" placeholder="Enter your comment"></textarea>
			</div>
		</div>
	</div>
	<button class="btn btn-primary btn-sm" name="comment">Comment</button>
</form>
<?php 

	include("../includes/connect.php");
	if(isset($_POST["comment"])){
		$user_comment = addslashes($_POST['comment']);
		$user_id = $_SESSION['user_id'];

		$insert = "INSERT INTO comments(comment, user_id) VALUES('$user_comment', '$user_id')";
		$result = mysql_query($insert);
		
		if($result){
			echo "Comments added";
		} 
	}


?>
