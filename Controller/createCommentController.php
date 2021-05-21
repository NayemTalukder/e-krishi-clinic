<?php 
  session_start();
  include('controller.php');
  $_SESSION['blog_id'] = $_POST['blog_id'];
  $_SESSION['author'] = $_POST['author'];
  $_SESSION['comment'] = $_POST['comment'];

  $_SESSION['message'] = "<script>alert('Something went wrong.')</script>";

  $res = $model->createComment();

  if ($res) {
    $_SESSION['message'] = "<script>alert('Your comment posted.')</script>";
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
