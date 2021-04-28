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

    <!-- <a class="dropdown-item" href="logout.php">Logout</a> -->
    <!-- Category container starts here -->
    <div class="container my-3 mb-5">
      <div class="col-lg-2 text-center bg-light my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
        <h2 class="text-center">Subjects </h2>
      </div>

      <div class="row" style="margin-left:67px;">
        <?php 
          $sql = "SELECT * FROM `subject`"; 
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['subjectId'];
            $name = $row['subjectName'];
            $desc = $row['subjectDesc'];
            echo '<div class="card mx-3 mb-3" style="width: 18rem;border-radius: 16px;">
                      <img src="images/subject/subjectcover-' .$id. '.jpg" class="card-img-top" alt="image for this category" width="100%" height="94px">
                      <img class="rounded-circle bg-dark" src="images/subject/subject-' .$id. '.jpg" style="width:100px;height:100px;padding:1px;margin-left: 95px;margin-top: -53px;">
                      <div class="card-body">
                        <h5 class="card-title"><a href="viewSubject.php?subjectId=' . $id . '">' .$name. '</a></h5>
                        <p class="card-text">' . substr($desc, 0, 25). '... </p>
                        <a href="viewSubject.php?subjectId=' . $id . '" class="btn btn-primary">View</a>
                      </div>
                    </div>';
          }
        ?>
      </div>
    </div>
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