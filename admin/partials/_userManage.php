<?php
    include $_SERVER['DOCUMENT_ROOT'].'/charusat/admin/dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['removeUser'])) {
        $Id = $_POST["Id"];
        $sql = "DELETE FROM `user` WHERE `userId`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
            window.location=document.referrer;
            </script>";
    }
    
    if(isset($_POST['editUser'])) {
        $id = $_POST["userId"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $userType = $_POST["userType"];

        $sql = "UPDATE `user` SET `firstName`='$firstName', `lastName`='$lastName', `email`='$email', `userType`='$userType' WHERE `userId`='$id'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update successfully');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    
}
?>