  <div class="main-menu container-fluid bg-p">
    <a class="mr-2 link-secondary text-white" href="index.php"><img class="brand " src="assets/e-krishi.jpg"></a>
    <!-- <img class="rounded " src="assets/e-krishi.jpg"> -->
    <div class="d-block-500 d-flex" >
      <ul>
        <!-- Home -->
        <li>
          <a class="nav-link text-white home active" href="index.php">
            <i class="fa fa-home"></i> Home
          </a>
        </li>

        <!-- Blog -->
        <li>
          <a class="nav-link text-white blog" href="blog.php">
            <i class="fa fa-calendar-check"></i> Blog
          </a>
        </li>
        <!-- Recorded Video Session -->
        <li>
          <a class="nav-link text-white recorded-video-session" href="recorded-video-session.php">
            <i class="fas fa-check"></i> Recorded Video Session
          </a>
        </li>

        <!-- Get Help -->
        <li>
          <a class="nav-link text-white get-help" href="get-help.php">
            <i class="fas fa-hands-helping"></i> Get Help
          </a>
        </li>
      </ul>

      <ul class="nav-margin" >
      <?php
        if (isset($_SESSION['loggedIn'])) {
          echo '<li><a class="nav-link font-family-1 text-white" href="../Controller/logoutController.php" >
            <i class="fa fa-sign-in mr_2"></i>  Log Out </a></li>';
        } else {
          echo '<li><a class="nav-link font-family-1 text-white login" href="login.php" >
                <i class="fa fa-sign-in mr_2"></i>  Log In </a></li>';
          echo '<li><a class="nav-link font-family-1 text-white register" href="register.php" >
                <i class="fa fa-user-plus mr_2"></i>  Register </a></li>';
        }
      ?>
      </ul>
      
    </div>
  </div>