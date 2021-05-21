<?php 
  if (session_status() === PHP_SESSION_NONE) session_start();
  include('controller.php');
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];
  $_SESSION['message'] = "<script>alert('Something went wrong.')</script>";
  $user = $model->login();
  //Confirmation
  if($user){
    $_SESSION['loggedIn'] = true;
    $_SESSION['author'] = $user['name'];
    $_SESSION['message'] = "<script>alert('Login Successful.')</script>";
    header("Location: ../View");
  } else header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
