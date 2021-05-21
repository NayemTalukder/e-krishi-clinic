<?php if (session_status() === PHP_SESSION_NONE) session_start() ?>
<?php include('header.php') ?>
<?php include("../Controller/getVideoSessionsController.php"); ?>

<div class="container-y">
  <div class="py-2 w-80 mx-auto">
    <div class="row">
      
      <?php while($rows = mysqli_fetch_assoc($result)) { ?>
        <div class="w-25 m_668 fb-video" data-href="<?php echo $rows['link'] ?>" data-show-text="false" ></div>
      <?php } ?>

    </div>
  </div>
</div>

<?php include('footer.php') ?>
<script>navHighlight('recorded-video-session')</script>