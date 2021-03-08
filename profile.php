<?php
   include 'dbconfig/config.php';  
  include 'header.php';
?>


<title>Home</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<div>

  <?php 
    $query = 'SELECT * FROM user Where email=$email';
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){

      while($row = mysqli_fetch_array($result)){

  ?>
<div class="card-container">
   <div style="padding:1vh;"> <p style="border-bottom: 0.2vh solid saddlebrown;">
        <?php echo $row['position']; ?>
    </p></div>
    <div class="image"><img class="round" src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']?>" width="  150" height="150"/></div>
    <h3> <?php echo $row['username']; ?></h3>
    <h6><?php echo $row['university']; ?> University</h6>
    
    <p style="margin-top:1vh;">
        E-mail : <?php echo $row['email'];  ?>
    </p>
</div>

<?php
  }
}

?>
</div>
