<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>LogIn Form</title>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url('assets/'); ?>vendors/style.css" rel="stylesheet">
<link rel="icon" type="image/png" href="<?php echo base_url('img/icon.png'); ?>" type="image/ico" />



      <link rel="stylesheet" href="css/style.css">


</head>

<body>

<div id="container">
  <h1>Log In</h1>

  <form action="<?php echo base_url('login/validasi/'); ?>" method="post" enctype="multipart/form-data" role="form">
    <input type="name" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <div class="text-center text-error" style="color:red;padding-left:32px">

          <?php echo $error; ?>
          <br>
          </div>
    <button type="submit" class="btn btn-success">Log In</button>
</form>
</div>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="<?php echo base_url('assets/'); ?>vendors/index.js"></script>


    <script  src="js/index.js"></script>




</body>

</html>
