<?php

	$MSG_ERROR = 'error';
	$MSG_SUCCESS = 'success';

	if(isset($_POST['email']) && strlen($_POST['email'])>1 ){
	
		$con = mysql_connect("localhost","root","root");

		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING);
		
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}

		if($email) {

			mysql_select_db("braziljs", $con);

			$query = "INSERT INTO newsletter (email, date) VALUES ('" .$email."', NOW())";

			mysql_query($query);

			mysql_close($con);

			echo $MSG_SUCCESS;
		} else {
			echo $MSG_ERROR;
		}


	} else {

		echo $MSG_ERROR;

	}
?>