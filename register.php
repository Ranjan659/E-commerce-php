<?php
	require 'dbconfig/config.php';

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-
    fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/register.css" />
    <title>Register</title>
</head>
<body>

	 
<div class="container">
  <a href="#"><img class="logo" src="img/logo.png" /></a>
  <div class="card">
    <h1>Register</h1>

    <form class="form" action="" method="POST">

      <input type="email" name="email" class="form-input" placeholder="E-mail" required />
  
      <input type="text" name="username" class="form-input" placeholder="Username" required />

        <input type="tel" name="pno" class="form-input" placeholder="Phone Number" pattern="[0-9]{10}" required />

      <input type="password" name="password" class="form-input" placeholder="Password" />

      <input type="password" name="cpassword" class="form-input" placeholder="Confirm Password"  />
  
      <input type="submit" name="signup-btn" class="form-btn" value="signup" />
      
      <div class="form-input" style="background-color: transparent; display: flex;justify-content: center; ">
        <p>Already a user ? <a href="login.php" style="color: #1324f3">Sign In</a></p>
    </div>
  
    </form>
            <?php 

            $error = NULL;

            if(isset($_POST['signup-btn'])){
            $email = $_POST['email'];
            $username = $_POST['username'];
            $pno = $_POST['pno'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $role = 'user';

            $email_query = "SELECT * from user WHERE email = '$email' ";
            $email_query_run = mysqli_query($con, $email_query);

            $username_query= "SELECT * FROM user WHERE username = '$username' ";
            $username_query_run = mysqli_query($con, $username_query);


            if(strlen($username)<5){
                $error = "<p> <font color=red>Username must have at least 5 characters.</font> </p>";
            }
            elseif($cpassword!= $password){
                $error .= "<p><font color=red>Your passwords donot match.</font></p>";
                
            }
            elseif(mysqli_num_rows($username_query_run)>0){
                $error .= "<p> <font color=red> Username already exist ! Try another username.</font> </p>";
                    
            }
            elseif(mysqli_num_rows($email_query_run)>0){
                $error .= "<p> <font color=red> Email already exist ! </font> </p>";
            }

            else {
                $email = $con->real_escape_string($email);
                $username = $con->real_escape_string($username);
                $pno = $con->real_escape_string($pno);
                $password = $con->real_escape_string($password);
                $cpassword = $con->real_escape_string($cpassword);

                $vkey = sha1(time().$email);


                $password = sha1($password);

                $insert = $con->query("INSERT INTO user(email, username, phonenumber, password, vkey ,role)
                VALUES('$email','$username','$pno','$password','$vkey','$role')");

                if($insert){
                    $to = $email;
                    $subject = "Email Verification";
                    $message = "<p>To verify your account please visit : <a href='http://localhost/AMS/verify.php?vkey=$vkey'>Register Account</a></p>";
                    $headers = "From: ranjanbhattarai660@gmail.com";
                    $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

                    mail($to,$subject, $message,$headers);

                    $error = "Successfull. Please verify your account.";

                }
                else {
                    echo $con->error;
                }

            }
        }
echo $error;

            ?>
		</div>
	</div>

</body>
</html>
