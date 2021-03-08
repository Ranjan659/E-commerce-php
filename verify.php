<?php
	require 'dbconfig/config.php';

	if(isset($_GET['vkey'])){

		$vkey = $_GET['vkey'];

		$resultSet = $con->query("SELECT verified, vkey FROM user WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

		if($resultSet->num_rows == 1){
			$update = $con->query("UPDATE user SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

			if($update){
				echo "Your account has been verified you may now login.";
			}
			else{
				echo $con->error;
			}
		}	
		else {
			echo "This account is invalid or already verified.";
		}

	}
	else {
		die("Something went wrong.");
	}

	
?>