<?php
    $error = NULL;
    session_start();
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
    <title>Login</title>
</head>
<body>

<div class="container">
    <a href="#"><img class="logo" src="img/logo.png" /></a>
    <div class="card login-card">
    <h1>Login</h1>

    <form class="form" action="" method="POST">

      <input type="email" name="email" class="form-input" placeholder="E-mail" required />
  
      <input type="password" name="password" class="form-input" placeholder="Password" required />
        
      <input type="checkbox" name="remember" value="1" /><p style="color:white; display: inline-block; margin:1%;">Remember Me</p>

      <input type="submit" name="signin-btn" class="form-btn" value="Login" />
      
      <div class="form-input" style="background-color: transparent; display: flex;justify-content: center; padding-bottom: 0; ">
        <p>Not yet a user ? <a href="register.php" style="color: #1324f3">Sign Up</a></p>
    </div>

    <div class="form-input" style="background-color: transparent; display: flex;justify-content: center; margin: 0; padding-top: 0;">
        <p> <a href="forget-password.php" style="color: #1324f3">Forgot Password ? </a></p>
    </div>
  
    </form>
        
        <?php
            if(isset($_POST['signin-btn'])){

                $email = $con->real_escape_string($_POST['email']);
                $password = $con->real_escape_string($_POST['password']);
                $password = sha1($password);

                $resultSet = $con->query("SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1");

                if($resultSet->num_rows != 0){
                    $row = $resultSet->fetch_assoc();
                    $verified = $row['verified'];
                    $username = $row['username'];
                    $date = $row['createddate'];
                    $date = strtotime($date);
                    $date = date('M D Y',$date);

                    if($verified == 1){
                        $_SESSION['ROLE']=$row->role;
                        $_SESSION['IS_LOGIN']='yes';
                        if($row['role'] == 'admin'){
                            header('location:adminIndex.php');
                        }
                        if($row['role'] == 'user'){
                            header('location:index.php');
                        }
                    }
                    else{
                        $error = "This account has not yet been verified. An email was sent to $email on $date.";
                    }
                }
                else {
                    $error = "<p><font color=red >Email and Password donot match.</font></p>";
                }
            }

                echo $error;           
        ?>

        </div>


    </div>

</body>
</html>