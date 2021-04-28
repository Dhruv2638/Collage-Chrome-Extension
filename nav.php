      <nav id="sidebar" class="active">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4">
          <h1><a href="index.html" class="logo">CHARUSAT</a></h1>
          <ul class="list-unstyled components">
          <li class="active">
            <a href="/charusat/"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <?php 
          $sql = "SELECT * FROM `subject`"; 
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['subjectId'];
            $name = $row['subjectName'];
            echo '<li>
                    <a href="viewSubject.php?subjectId=' . $id . '"><span class="fa fa-sticky-note mr-3"></span>' .$name. '</a>
                  </li>';
          }
          ?>
          <li>
            <a href="contact.php"><span class="fas fa-hands-helping"></span> Contact Us</a>
          </li>
          <li style="margin-top:96px">
            <a href="logout.php"><span class="fas fa-sign-out-alt"></span> Log Out</a>
          </li>
          </ul>
          
          <div class="footer">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://github.com/Dhruv2638" target="_blank">Dhruv Nagar</a></p>
          </div>
        </div>
      </nav>