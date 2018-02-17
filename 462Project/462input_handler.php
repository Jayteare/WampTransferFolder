<?php
include 'initiate_db.php';
if(isset($_POST['login_submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $query = "SELECT COUNT(*), username, password, role FROM (SELECT username, password, role FROM users WHERE username = '".$username."' && password = '".$password."') AS x";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll();

  foreach ($result as $row){
    if($row['COUNT(*)'] > 0){
      if($row['role'] == "admin"){
        $_SESSION['user'] = $username;
        header('Location:http://localhost/462Project/admin_homepage.html.php');
      }elseif($row['role'] == "manager"){
        $_SESSION['user'] = $username;
        header('Location:http://localhost/462Project/manager_homepage.html.php');
      }elseif($row['role'] == "employee"){
        $_SESSION['user'] = $username;
        header('Location:http://localhost/462Project/employee_homepage.html.php');
      }
    } else{
      header('Location:http://localhost/462Project/index.html.php');
    }
  }
}
?>
