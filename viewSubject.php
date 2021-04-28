<?php 
    session_start();
    if(isset($_SESSION['userloggedin']) && $_SESSION['userloggedin']==true){
        $userloggedin= true;
        $userId = $_SESSION['userId'];
    }
    else{
        $userloggedin = false;
        $userId = 0;
    }

    if($userloggedin) {
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Home</title>
    <link rel="stylesheet" href="sidebar-03/css/style.css">
    <style>
        .top-left {
            position: absolute;
            top: 135px;
            left: 353px;
        }
        .top-left h2{
            color:white;
        }
    </style>
  </head>
<body>
  <?php include 'dbconnect.php';?>

  <?php
      if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You are logged in
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
      }
  ?>

  <div class="wrapper d-flex align-items-stretch">
    
    <?php include 'nav.php'; ?>

    <?php 
        $subjectId = $_GET['subjectId'];
        $sql = "SELECT * FROM `subject` WHERE `subjectId`= $subjectId "; 
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $name = $row['subjectName'];
        $desc = $row['subjectDesc'];

        echo '<div class="container mt-5">
                <img src="images/subject/subjectcover-' .$subjectId. '.jpg" class="card-img-top border" alt="image for this category" width="997.6px" height="240px" style="border-radius:10px">
                <div class="top-left"><h2>' .$name. '</h2></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav" style="font-size: 19px;font-weight: bold;">
                        <a class="nav-item nav-link" href="viewSubject.php?subjectId=' .$subjectId. '&page=video" style="padding:0px;margin-left: 20px;">Video</a>
                        <a class="nav-item nav-link" href="viewSubject.php?subjectId=' .$subjectId. '&page=doc" style="padding:0px;margin-left: 30px;">Documents</a>
                        </div>
                    </div>
                </nav>';

        $page = isset($_GET['page']) ? $_GET['page'] :'video';
        include $page.'.php';

        echo '</div>';
    ?>

  </div>
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="sidebar-03/js/jquery.min.js"></script>
    <script src="sidebar-03/js/popper.js"></script>
    <script src="sidebar-03/js/bootstrap.min.js"></script>
    <script src="sidebar-03/js/main.js"></script>
</body>
</html>
<?php
    }
    else{
        header("location: /charusat/login.php");
    }
?>