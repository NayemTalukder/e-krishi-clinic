<?php if (session_status() === PHP_SESSION_NONE) session_start() ?>
<?php include('header.php') ?>
<?php include("../Controller/getBlogsController.php"); ?>

<div class="container-y">
  <div class="py-2 w-80 mx-auto">
    <div class="row">
    
      <?php while($rows = mysqli_fetch_assoc($result)) { ?>
        <div class="w-25 m_668">
          <a href="blog-details.php?id=<?php echo $rows['id'] ?>"><img class="w-25 " src="<?php echo $rows['image'] ?>"></a>
          <div class="mt_5 mb-1">
            <a class="link" href="blog-details.php?id=<?php echo $rows['id'] ?>"><h4><?php echo $rows['title'] ?></h4></a>
            <h6><?php echo $rows['author'] ?></h6>
            <h6><?php echo $rows['date'] ?></h6>
          </div>
          <p><?php echo substr($rows['description'], 0, 300) . '....' ?></p>
        </div>
      <?php } ?>

    </div>
  </div>
</div>

<?php include('footer.php') ?>
<script>navHighlight('blog')</script>