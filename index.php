<?php
  include 'dbconfig/config.php';  
  include 'header.php';
  session_start();
?>


<title>Home</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>

</head>
<body>
<div>
<p class="header">Our staffs</p>


  <?php 
    $query = 'SELECT * FROM staffs ORDER BY id ASC';
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){

      while($row = mysqli_fetch_array($result)){

  ?>
<div class="card-container">
   <div style="padding:1vh;"> <p style="border-bottom: 0.2vh solid saddlebrown;">
        <?php echo $row['position']; ?>
    </p></div>
    <div class="image"><img class="round" src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']?>" width="  150" height="150"/></div>
    <h3> <?php echo $row['name']; ?></h3>
    <h6><?php echo $row['university']; ?> University</h6>
    
    <div class="about">
        <p><?php echo $row['about']; ?></p> 
    </div>
    <p style="margin-top:1vh;">
        E-mail : <?php echo $row['email'];  ?>
    </p>
</div>

<?php
  }
} 

?>
</div>

<script type="text/javascript" src="js/header.js"></script>
</body>
</html>


