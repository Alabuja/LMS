<?php 
	include("../includes/connect.php");
	if(isset($_GET['course_id'])){
		$getid = $_GET['course_id'];

		$getnote = "SELECT * FROM notes WHERE course_id = '$getid'";
		$runnote = mysql_query($getnote);

		while ($rownote = mysql_fetch_array($runnote)) {
			$noteid = $rownote['note_id'];
			$courseid = $rownote['course_id'];
			$notename = $rownote['note_name'];

			echo "<a href='http://localhost/project/notes/$notename' download>".
				$notename
			."</a>
			<br><hr>";
		}
	}	
?>