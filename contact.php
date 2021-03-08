<?php
include 'header.php';
?>

<link rel="stylesheet" type="text/css" href="css/register.css">
<div class="container">
  <div class="card">
    <h1>Contact Us</h1>

    <form class="form" action="" method="POST">
  
      <input type="text" name="name" class="form-input" placeholder="Full Name" required />
  
      <input type="email" name="email" class="form-input" placeholder="E-mail">
  
      <input type="text" name="phone" class="form-input" placeholder="Your phone">
  
      <textarea class="form-input" name="message" placeholder="Your message"></textarea>
  
      <input type="submit" class="form-btn" value="Send">
  
    </form>
  </div>
</div>

  </body>
</html>
