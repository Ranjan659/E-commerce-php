<?php
  include 'dbconfig/config.php';  
  include 'header.php';
?>
<style type="text/css">

</style>

<title>Home</title>
<link rel="stylesheet" type="text/css" href="css/adminIndex.css">

</head>
<body>
    <div id="page-wrap">
<p class="header">Our staffs</p>
<div class="add-staffs"><a href="add-card.php">Add New</a></div>
 <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>University</th>
            <th>Position</th>
            <th>About</th>
            <th>E-mail</th>
            <th>Action</th>
        </tr>
        </thead>
     <?php 
    $query = 'SELECT * FROM staffs ORDER BY id ASC';
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){

      while($row = mysqli_fetch_array($result)){

        $id = $row['id'];
        $name = $row['name'];

  ?>
  <tbody>
<tr>
  <td><?php echo $row['id'] ?></td>
  <td><img src="<?php echo $row['image'] ?>"  style="border-radius: 50%; width:10vw; height:20vh"></td>
  <td><?php echo $row['name'] ?></td>
  <td><?php echo $row['university'] ?> University</td>
  <td><?php echo $row['position'] ?></td>
  <td class="about"><p><?php echo $row['about'] ?></p></td>
  <td><?php echo $row['email'] ?></td>
  <td class="action"><a href="update.php?id= <?php echo $id ?>" class="ud">Edit</a> <a href="adminIndex.php?delete=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $name;  ?> ?');"  class="ud">Delete</a></td>
  </td>
</tr>
</tbody>
<?php
  }
}
  
if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  $con->query("DELETE FROM staffs WHERE id = '$delete_id'");
  header("location:adminIndex.php");
}

?>
</table>
</div>
</body>
</html>