<?php
  require_once "connection.php";
  session_start();
  if($_SERVER['REQUEST_METHOD']=="POST") {

      if(empty($_POST['usr']) || empty($_POST['pwd'])) {
          header("location: admin.php?EmptyInput=Please enter username or password");
      }else{
        $inputUsername = $_POST['usr'];
        $inputPassword = $_POST['pwd'];

        $sql = "SELECT * FROM goduser WHERE username='".$inputUsername."'AND pass='".$inputPassword."'";
        $query = mysqli_query($conn,$sql);

        if(mysqli_fetch_assoc($query)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['Username'] = $inputUsername;
            header("location: admin.php");

        }else{
            header("location: admin.php?Error=Wrong username or password");
        }
      }
  }else{
      echo"This login machine didnt working";
  }
?>