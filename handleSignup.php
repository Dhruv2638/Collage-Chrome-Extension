<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // Check whether this username exists
    $existSql = "SELECT * FROM `user` WHERE userName = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
        header("Location: /charusat/login.php?signupsuccess=false&error=$showError");
    }
    else{
      if(($password == $cpassword)){
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `user` ( `userName`, `firstName`, `lastName`, `email`, `password`, `createDate`) VALUES ('$username', '$firstName', '$lastName', '$email', '$hash', current_timestamp())";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              header("Location: /charusat/login.php?signupsuccess=true");
          }
      }
      else{
          $showError = "Passwords do not match";
          header("Location: /charusat/login.php?signupsuccess=false&error=$showError");
      }
    }
}
    
?>