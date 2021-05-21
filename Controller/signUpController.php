<?php 
  session_start();
  include('controller.php');
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];
  $_SESSION['message'] = "<script>alert('Something went wrong.')</script>";
  // Form Validation
  if (empty($_SESSION['name']) || empty($_SESSION['email']) || empty($_SESSION['password']) ) {
    $_SESSION['message'] = "<script>alert('Empty Field Detected. You cannot leave any field empty.')</script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    $user = $model->signUp();
    //Confirmation
    if($user){
      $_SESSION['loggedIn'] = true;
      $_SESSION['author'] = $_SESSION['name'];
      $_SESSION['message'] = "<script>alert('Sign Up Successful.')</script>";
      header("Location: ../View");
    } else header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
