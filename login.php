<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Responsive Login Form Sign In Sign Up</title>
</head>

<body>
    
    <?php
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> ' .$_GET['error']. '
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
              </div>';
    }

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
              <strong>Success!</strong> You can now login.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Invalid Credentials
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    ?>
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <img src="assets/img/img-login.svg" alt="">
            </div>

            <div class="login__forms">
                <form class="login__registre" action="handleLogin.php" method="post" id="login-in">
                    <h1 class="login__title">Log In</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" id="username" name="username" placeholder="Username" class="login__input" required> 
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" id="password" name="password" placeholder="Password" class="login__input" required>
                    </div>

                    <button type="submit" class="login__button">Log In</button>

                    <div>
                        <span class="login__account">Don't have an Account ?</span>
                        <span class="login__signin" id="sign-up">Sign Up</span>
                    </div>
                </form>

                <form action="handleSignup.php" method="post" class="login__create none" id="login-up">
                    <h1 class="login__title">Create Account</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" id="username" name="username" placeholder="Username" class="login__input" required minlength="3">
                    </div>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" id="firstName" name="firstName" placeholder="First Name" class="login__input" required>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="login__input" required>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-at login__icon'></i>
                        <input type="text" id="email" name="email" placeholder="Email" class="login__input" required>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" id="password" name="password" placeholder="Password" class="login__input" required>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" id="cpassword" name="cpassword" placeholder="ConfirmPassword" class="login__input" required>
                    </div>

                    <button type="submit" class="login__button">Sign Up</button>

                    <div>
                        <span class="login__account">Already have an Account ?</span>
                        <span class="login__signup" id="sign-in">Log In</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js"></script>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
</body>

</html>