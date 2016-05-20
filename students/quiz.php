<?php 
	include("../includes/connect.php");
	if(isset($_GET['course_id'])){
		$getid = $_GET['course_id'];

		$gettest = "SELECT * FROM question WHERE course_id = '$getid'";
		$runtest = mysql_query($gettest);

		while ($rowtest = mysql_fetch_row($runtest)) {
			$noteid = $rowtest['0'];
			$courseid = $rowtest['1'];
			$question = $rowtest['2'];
			$option1 = $rowtest['3'];
			$option2 = $rowtest['4'];
			$option3 = $rowtest['5'];
			$option4 = $rowtest['6'];

			echo "<form method='post' action=''>
				<div class='form-group'>
				<span> $question</span>
				</div>
				<div class='form-group'>
					A. <input type='radio' name='option' value='1'/> $option1
				</div>
				<div class='form-group'>
					B. <input type='radio' name='option' value='2'/> $option2
				</div>
				<div class='form-group'>
					C. <input type='radio' name='option' value='3'/> $option3
				</div>
				<div class='form-group'>
					D. <input type='radio' name='option' value='4'/> $option4
				</div>
				<div class='form-group'>
					<button class='btn btn-danger btn-md'>Next</button>
				</div>
			</form>";
		}
	}
?>