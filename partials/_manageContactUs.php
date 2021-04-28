<?php
include $_SERVER['DOCUMENT_ROOT'].'/charusat/dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $password = $_POST["password"];

    // Check user password is match or not
    $passSql = "SELECT * FROM user WHERE userId='$userId'"; 
    $passResult = mysqli_query($conn, $passSql);
    $passRow=mysqli_fetch_assoc($passResult);
    
    if (password_verify($password, $passRow['password'])){
        $sql = "INSERT INTO `contact` (`userId`, `email`, `message`, `time`) VALUES ('$userId', '$email', '$message', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $contactId = $conn->insert_id;
        echo '<script>alert("Thanks for Contact us. Your contact id is ' .$contactId. '. We will contact you very soon.");
                    window.location.href="http://localhost/charusat/";  
                    </script>';
                    exit();
    }
    else{
        echo "<script>alert('Password incorrect!!');
                window.history.back(1);
                </script>";
    }
    
}
?>