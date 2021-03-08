<?php 

	$con = mysqli_connect("localhost","root","") or die("unable to connect");
	// or $con = mysqli_connect("localhost","root","","ams"); 
	mysqli_select_db($con,"ams");


?>