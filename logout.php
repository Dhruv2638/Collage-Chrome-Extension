<?php

session_start();
echo "Logging you out. Please wait...";
unset($_SESSION["userloggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["userId"]);

// session_unset();
// session_destroy();

header("location: /charusat/home.php");
?>