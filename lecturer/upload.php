	<form method="post" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<select class="form-control" size="1" name="course">
						<option>Select a course</option>
						<?php 
						include("../includes/connect.php");
							$useremail = $_SESSION['email'];
							$get_sess = "SELECT * FROM users WHERE email = '$useremail'";
							$run_sess = mysql_query($get_sess);

							$row_sess = mysql_fetch_array($run_sess);
							$userid = $row_sess['user_id'];
								$get_course = "SELECT * FROM enrol WHERE user_id='$userid' AND course_id != '0'";
								$run_course = mysql_query($get_course);

								while($row_course = mysql_fetch_array($run_course)){
									$courseid = $row_course['course_id'];
									/*$coursetitle = $row_course['course_title'];*/

									/*Get from courses for course_id*/

									$userc = "SELECT * FROM courses WHERE course_id = '$courseid'";
									$run_userc = mysql_query($userc); 
									$row_userc = mysql_fetch_array($run_userc);
									$courseTitle = $row_userc['course_title'];

									/*End for course_id*/

									echo "<option value='$courseid'>$courseTitle</option>"; 
								}
						?>
						
					</select>
				</div>
				<div class="form-group">
					<input class="form-control" type="file" name="uploadFile">
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-lg" name="uload">Upload (<?php echo ini_get('upload_max_filesize').'B'; ?>)</button>
				</div>
			</div>
		</div>
		
	</form>

<?php 
	error_reporting(0);
	include("../includes/connect.php");
	$UploadDirectory	= '../notes/'; //Upload Directory, ends with slash & make sure folder exist

	if($_POST){

		if($_FILES['uploadFile']['error']){
			//File upload error encountered
			die(upload_errors($_FILES['uploadFile']['error']));
		}

		$FileName = strtolower($_FILES['uploadFile']['name']); //uploaded file name
		$ImageExt = substr($FileName, strrpos($FileName, '.')); //file extension
		$FileType = $_FILES['uploadFile']['type']; //file type
		$FileSize = $_FILES['uploadFile']["size"]; //file size
		
		switch(strtolower($FileType)){

			//allowed file types
			case 'image/png': //png file
			case 'image/gif': //gif file 
			case 'image/jpeg': //jpeg file
			case 'application/pdf': //PDF file
			case 'application/msword': //ms word file
			case 'application/vnd.ms-excel': //ms excel file
			case 'application/x-zip-compressed': //zip file
			case 'text/plain': //text file
			case 'text/html': //html file
			case 'application/vnd.ms-powerpoint': //powerpoint file
				break;
			default:
				die('Unsupported File!'); //output error
		}

	   //Rename and save uploded file to destination folder.
	   if(move_uploaded_file($_FILES['uploadFile']["tmp_name"], $UploadDirectory . $FileName )){
			//connect & insert file record in database
			mysql_query("INSERT INTO notes (course_id, note_name, note_type, note_size) VALUES ('$courseid','$FileName', '$FileType', '$FileSize')");

			echo "<script>alert('Note successfully uploaded')</script>";
			echo "<script>window.open('', '_self')</script>";	
	   }
	   else{
	   		die('error uploading File!');
	   }
	}

	//function outputs upload error messages
	function upload_errors($err_code) {
		switch ($err_code) { 
	        case UPLOAD_ERR_INI_SIZE: 
	            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini'; 
	        case UPLOAD_ERR_FORM_SIZE: 
	            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'; 
	        case UPLOAD_ERR_PARTIAL: 
	            return 'The uploaded file was only partially uploaded'; 
	        case UPLOAD_ERR_NO_FILE: 
	            return 'No file was uploaded'; 
	        case UPLOAD_ERR_NO_TMP_DIR: 
	            return 'Missing a temporary folder'; 
	        case UPLOAD_ERR_CANT_WRITE: 
	            return 'Failed to write file to disk'; 
	        case UPLOAD_ERR_EXTENSION: 
	            return 'File upload stopped by extension'; 
	        default: 
	            return 'Unknown upload error'; 
	    } 
	} 
?>