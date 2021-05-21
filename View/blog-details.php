<?php 
  if (session_status() === PHP_SESSION_NONE) session_start();
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  } 
?>
<?php include('header.php') ?>
<?php $id = $_GET['id']  ?>
<?php include("../Controller/getBlogByIdController.php"); ?>
<?php include("../Controller/getCommentsController.php"); ?>
<?php $rows = mysqli_fetch_assoc($result) ?>

<div class="container-y">
  <div class="py-2 w-80 mx-auto">
    <a href=""><img class="w-100 " src="<?php echo $rows['image'] ?>"></a>
    <div class="mt_5 mb-1">
      <h1><?php echo $rows['title'] ?></h1>
      <h5><?php echo $rows['author'] ?></h5>
      <h6><?php echo $rows['date'] ?></h6>
    </div>
    <p><?php echo $rows['description'] ?></p>
    <!-- Comment Section -->
    <div class="comment-section mt-2">
      <h3>LEAVE A REPLY</h3>
      <!-- Comment Box -->
      <?php
        if (isset($_SESSION['loggedIn'])) {
          $author = $_SESSION['author'];
          echo "
          <div class='coment-box'>
            <form class='mt-1 form-text' action='../Controller/createCommentController.php' method='POST' >
              <div>
                <div class='w-100 center bg-p text-white'>
                  <label for='your-comment' >Your Comment</label>
                </div>
                <textarea type='text' name='comment' class='form-control' placeholder='Comment' ></textarea>
                <input name='author' class='d-none' type='text' value='$author' >
                <input name='blog_id' class='d-none' type='text' value=$id >
              </div>
              <!-- Submit -->
              <div class='sign-info text-center'>
                <button type='submit' class='btn btn-primary w-100 mt-1 text-white cursor-pointer'>Post Comment</button>
              </div>
            </form>
          </div>";
        } else {
          // Login Box
          echo '
          <a class="login-box w-100 h-35 center bg-p mt-1 text-white link-secondary" href="login.php">
            <h1 >Login / Register</h1>
          </a>';
        }
      ?>
      

      <!-- All Coments -->
      <div class="w-100 center bg-p text-white mt-1">
        <label for="your-comment" >All Comments</label>
      </div>
      <?php while($rows = mysqli_fetch_assoc($coments)) { ?>
        <div class="w-100 bg-po co-t">
          <div class="mt_5 mb-1 p-1">
            <div class="d-flex">
              <i class="fas fa-user-secret font-2"></i>
              <h4 class="py_5 px_5" ><?php echo $rows['author'] ?></h4>
            </div>
            <h4 class="pt-1" ><?php echo $rows['comment'] ?></h4>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php include('footer.php') ?>
<script>navHighlight('blog')</script>