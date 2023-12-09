<?php
	session_start();
	$errmsg_arr = array();
	$errflag = false;
	$link = mysqli_connect('localhost','root',"");

	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	$db = mysqli_select_db($link,'pos_db');
	if(!$db) {
		die("Unable to select database");
	}

	$login = $_POST['username'];
	$password = $_POST['password'];

	$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";
	$result=mysqli_query($link,$qry);

	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_LAST_NAME'] = $member['position'];
			session_write_close();
			header("location: main/index.php");
			exit();
		}else {
		    echo 'Wrong login details';
			
		}
	}else {
		die("Query failed");
	}
?>