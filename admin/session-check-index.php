<?php
	error_reporting(0);
    session_start();
    require 'connect.php';
    if($_SESSION['email']){
        header("location:admin.php");
    }
?>