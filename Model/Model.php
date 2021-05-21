<?php
  class Model {
    // Create Query
    public function createComment() {
      if (session_status() === PHP_SESSION_NONE) session_start();
      include('connect.php');
      $blog_id = $_SESSION['blog_id'];
      $author = $_SESSION['author'];
      $comment = $_SESSION['comment'];
  
      $query = "INSERT INTO comments (id, blog_id, author, comment) VALUES (NULL, $blog_id,'$author', '$comment')";
      return mysqli_query($con, $query);
    }
    public function createGetHelp() {
      include('connect.php');
      $name = $_SESSION['name'];
      $phone = $_SESSION['phone'];
      $problem = $_SESSION['problem'];
      
      $query = "INSERT INTO get_help (id, name, phone, problem) VALUES (NULL, '$name','$phone', '$problem')";
      return mysqli_query($con, $query);
    }

    // Login Query
    public function login() {
      if (session_status() === PHP_SESSION_NONE) session_start();
      include('connect.php');
      $email = $_SESSION['email'];
      $password = $_SESSION['password'];
    
      //User validation
      $user_check_query = "SELECT * FROM users WHERE email = '$email' AND pass ='$password' LIMIT 1";
      $results = mysqli_query($con, $user_check_query);
      return mysqli_fetch_assoc($results);
    }
    public function signUp() {
      if (session_status() === PHP_SESSION_NONE) session_start();
      include('connect.php');
      $name = $_SESSION['name'];
      $email = $_SESSION['email'];
      $password = $_SESSION['password'];
    
      //User validation
      $user_check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
      $results = mysqli_query($con, $user_check_query);
      if (!mysqli_fetch_assoc($results)) {
        $query = "INSERT INTO users (id, name, email, pass) VALUES (NULL, '$name','$email', '$password')";
        return mysqli_query($con, $query);
      } else {
        $_SESSION['message'] = "<script>alert(`A user with '$email' this email already exists.`)</script>";
        return FALSE;
      } 
    }
    
    // View Queries
    public function getBlogs() {
      include('connect.php');
      $query = "SELECT * from blogs";
      return mysqli_query($con, $query);
    }
    public function getBlogById($id) {
      include('connect.php');
      $query = "SELECT * from blogs WHERE id = $id LIMIT 1";
      return mysqli_query($con, $query);
    }
    public function getVideoSessions() {
      include('connect.php');
      $query = "SELECT * from video_sessions";
      return mysqli_query($con, $query);
    }
    
    public function getComments($id) {
      include('connect.php');
      $query = "SELECT * FROM comments WHERE blog_id = $id";
      return mysqli_query($con, $query);
    }
  }