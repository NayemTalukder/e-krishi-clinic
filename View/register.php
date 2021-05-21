<?php
  session_start();
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
?>
<?php include('header.php') ?>

<div class="w-100 h-100 bg-p center">
  <div class="sign-in-form mx-auto">
    <h3 class="text-center text-white">Sign Up</h3>
      <form class="mt-4 form-text" action="../Controller/signUpController.php"  method="POST" >
        <div class="form-group">
          <label for="name" class="text-white" >Name</label>
          <input type="text" name="name" class="form-control w-100" placeholder="name" >
        </div>
        <div class="form-group">
          <label for="email" class="text-white" >Email</label>
          <input type="email" name="email" class="form-control w-100" placeholder="email" >
        </div>
        <div class="form-group">
          <label for="password" class="text-white" >Password</label>
          <input type="password" name="password" class="form-control w-100" placeholder="password" >
        </div>
        <div class="sign-info text-center">
            <button type="submit" class="btn btn-inverse cursor-pointer mt-1 w-102_3 text-white">Sign Up</button>
        </div>
      </form>
  </div>
</div>

<?php include('footer.php') ?>
<script>navHighlight('register')</script>