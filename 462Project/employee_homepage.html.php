<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Employee Homepage</title>
  </head>
  <body>
    Hello <?php echo $_SESSION['fname'] ?> <?php echo $_SESSION['lname']; ?>.  Welcome to the employee homepage.
  </body>
</html>
