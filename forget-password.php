<?php
	require 'dbconfig/config.php';
    $error = NULL;

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-
    fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/register.css" />
    
    <title>Forget password</title>

</head>

<body>

     <div class="container">
        <a href="#"><img class="logo" src="img/logo.png" /></a>
        <div class="card login-card">
        <h1>Forget Password</h1>

        <form class="form" action="" method="POST">
        
            <input type="email" name="email" class="form-input" placeholder="E-mail" required />
                
            <input type="submit" name="forget-pass" class="form-btn" value="Confirm" />
                
        </form>

        <?php 
        	if(isset($_POST['forget-pass'])){
        		$email = $con->real_escape_string($_POST['email']);

                $vkey_query =$con->query("SELECT vkey from user WHERE email = '$email' ");

                $vkey = $vkey_query->fetch_object();


            	if($vkey_query->num_rows>0){

                    $to = $email;
                    $subject = "Reset Password"; 
                    $message = "To reset password Please visit : <a href='http://localhost/AMS/reset-password.php?vkey=$vkey->vkey'>Reset Password.</a>";
                    $headers = "From: ranjanbhattarai660@gmail.com";
                    $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

                    mail($to,$subject,$message,$headers);
            	    
                    $error .= "Please check your email";
                }
            	else{
            		$error .= "Your email donot match. Please check yout inputs";
            	
                }
            
        }

        echo $error;

    ?>
        </div>
    </div>

</body>
</html>