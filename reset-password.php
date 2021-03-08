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
    <title>Reset Password</title>
</head>
<body>

<div class="container">
  <a href="#"><img class="logo" src="img/logo.png" /></a>
  <div class="card login-card">
    <h1>Reset Password</h1>

            <form class="form" action="" method="POST">
                
                <input type="password" name="password" class="form-input" placeholder="Password" required />

		      	<input type="password" name="cpassword" class="form-input" placeholder="Confirm Password" required />
      			
      			<input type="submit" name="confirm-pass" class="form-btn" value="Confirm" />
                

            </form>
		<?php 
			if(isset($_POST['confirm-pass'])){

				$password = $_POST['password']; 
				$cpassword = $_POST['cpassword'];


				if($password != $cpassword){
					$error .= "Your Passwords donot match.";
				}

				else{
					if(isset($_GET['vkey']) ){
						$vkey = $con->real_escape_string($_GET['vkey']);
                		$password = $con->real_escape_string($password);

                		$password = sha1($password);


						$update = $con->query("UPDATE user SET password = '$password' WHERE vkey = '$vkey' ");
                		
                		if($update){
							$error .= "Congratulation! Your password has been changed successfully.";
						}
						else{
							echo $con->error;
						}


					}
				}

			}	

			echo $error;
	?>

		</div>
	</div>

</body>
</html>