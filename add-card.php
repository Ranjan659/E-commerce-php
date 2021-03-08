<?php
  require 'dbconfig/config.php';

?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Staff Profile</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/add-card.css">
</head>
<body>

</body>
</html>

  <!DOCTYPE html>  
  <html >
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/add-card.css">
    </head>
    <body>

      <form action="" method="POST" enctype="multipart/form-data">
      
        <h1>Staff Profile </h1>
        
        <fieldset>
          <label for="image">Image: </label>
          <input type="file" name="image" id="name" accept="image/*" />

          <label for="name">Name:</label>
          <input type="text" id="name" name="name" />
          
          <label for="job">University:</label>
          <select id="job" name="university" />
            <option value="Tribhuvan">Tribhuvan University</option>
            <option value="Kathmandu">Kathmandu University</option>
            <option value="Pokhara">Pokhara University</option>
            <option value="Purbanchal"> Purbanchal Univerisy</option>
          
        </select>
          
          <label for="mail">Position:</label>
          <input type="text" id="mail" name="position" />

        <label for="bio">About:</label>
        <textarea id="bio" name="about"></textarea>

        <label for="mail">E-mail:</label>
        <input type="email" id="mail" name="email" />
        
        </fieldset>
        <button type="submit" name="confirm">Confirm</button>
      </form>
      <?php 
       $error = NULL;
       if(isset($_POST['confirm'])){

            $img = $_FILES['image'];
            $name = $_POST['name'];
            $position = $_POST['position'];
            $university = $_POST['university'];
            $about = $_POST['about'];
            $email = $_POST['email'];

             $name = $con->real_escape_string($name); 
             $position = $con->real_escape_string($position);
             $university = $con->real_escape_string($university);
             $about = $con->real_escape_string($about);
             $email = $con->real_escape_string($email);

             $imgname = $img['name'];
             $imgtemp= $img['tmp_name'];

             $imgext = explode('.',$imgname);
             $imgcheck =strtolower(end($imgext));

              $target = "uploaded_images/".$imgname;
              move_uploaded_file($imgtemp, $target);            
              
              $insert = $con->query("INSERT INTO staffs(image, name , position, university ,about,email)
              VALUES('$target','$name','$position','$university','$about','$email')");
                
                if($insert){
                  $error .= "Data Successfully inserted.";
                }
                else{
                  $error .= $con->error;
                } 

              echo $error; 

            }
            
      ?>