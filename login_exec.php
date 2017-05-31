<?php
	//Start session
	session_start();
 
	//Include database connection details
	require_once('connection.php');
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
 
	//Sanitize the POST values
	$email = $_GET['email'];
	$password = $_GET['password'];
 
	//Input Validations
	if($email == '') {
		$errmsg_arr[] = 'E-mail missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php");
		exit();
	}
 
	//Create query
	$qry="SELECT * FROM profile WHERE email='$email' AND password='$password'";
	$result=mysql_query($qry);
 
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$simple_login = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $simple_login['mem_id'];
			$_SESSION['SESS_FIRST_NAME'] = $simple_login['username'];
			$_SESSION['SESS_LAST_NAME'] = $simple_login['password'];
			session_write_close();
			header("location: Userprofile.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'E-mail and password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: login.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>
