<?php 

  header('Access-Control-Allow-Origin: http://localhost/OS/');
  
  // Start Session
  session_start();

  // Include in data base
  include('../mysql/connect.php');

  // Data Post
  $user = addslashes($_POST['user']);
  $password = addslashes($_POST['password']);

  if (!empty($user) && !empty($password)) {

    $consult_users = "SELECT * FROM adminstrador WHERE user_adminstrador='$user' AND password_adminstrador=md5('$password')";
    $result_users = mysqli_query($database, $consult_users);
    $result_final = mysqli_fetch_assoc($result_users);
  
    if($result_final > 0) {
        echo 'sucess';
        $_SESSION['id_admin'] = $result_final['id_adminstrador'];
        $_SESSION['admin_logged'] = true;
    } else {
        echo 'error';
    }

  } else {
    echo 'noData';
  }

 



?>