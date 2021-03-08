<?php
  require 'dbconfig/config.php';
  
  $error =NULL;

  $id= $_GET['id'];
  $query = $con->query("SELECT * FROM staffs WHERE id ='$id' ");
  $result = mysqli_fetch_assoc($query);
?>

  <!DOCTYPE html>  
  <html >
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/add-card.css">
    </head>
    <body>

      <form action="" method="POST" enctype="multipart/form-data">
      
        <h1>Update Profile </h1>
        
        <fieldset>
          <label for="image">Image: </label>
          <img src="<?php echo $result['image']; ?>" width="200" height="200">
          <input type="file" name="image" id="name" value="<?php $result['image']; ?>" />

          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value="<?php echo $result['name']; ?>" />
          
          <label for="job">University:</label>
          <select id="job" name="university"  />
            <option value="Tribhuvan">Tribhuvan University</option>
            <option value="Kathmandu">Kathmandu University</option>
            <option value="Pokhara">Pokhara University</option>
            <option value="Purbanchal"> Purbanchal Univerisy</option>
          
        </select>
          
          <label for="mail">Position:</label>
          <input type="text" id="mail" name="position"value="<?php echo $result['position']; ?>" />

        <label for="bio">About:</label>
        <textarea id="bio" name="about"><?php echo $result['about']; ?>"</textarea>

        <label for="mail">E-mail:</label>
        <input type="email" id="mail" name="email" value="<?php echo $result['email']; ?>" />
        
        </fieldset>
        <button type="submit" name="update">Update</button>
      </form>
      <?php 
       if(isset($_POST['update'])){
            $img = $_FILES['image'];
            $name = $_POST['name'];
            $position = $_POST['position'];
            $university = $_POST['university'];
            $about = $_POST['about'];
            $email = $_POST['email'];

             $imgname = $img['name'];
             $imgtemp= $img['tmp_name'];

             $imgext = explode('.',$imgname);
             $imgcheck =strtolower(end($imgext));

             $target = "uploaded_images/".$imgname;
             unlink($result['image']);
              move_uploaded_file($imgtemp, $target);

            $update = $con->query("UPDATE staffs SET image='$target' ,name = '$name',university = '$university',position='$position',about='$about',email='$email' WHERE id = '$id' ");

            if($update){
              echo "Profile updated successfully";
            }
            else{
              echo $con->error;
            }
        }
            
      ?>

