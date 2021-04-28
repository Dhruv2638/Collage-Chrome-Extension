<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from user where userName='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        
        $userId = $row['userId'];
        if (password_verify($password, $row['password'])){ 
            session_start();
            $_SESSION['userloggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            header("location: /charusat/home.php?loginsuccess=true");
            exit();
        } 
        else{
            header("location: /charusat/login.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /charusat/login.php?loginsuccess=false");
    }
}    
?>