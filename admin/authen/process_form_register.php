<?php
$fullname = $email = $msg = $password = '';
if (!empty($_POST)) {
  $fullname = getPost('fullname');
  $email = getPost('email');
  $password = getPost('password');
  if (empty($fullname) || empty($email) || empty($password) || strlen($password) < 6) {
  } else {
    // validation thanh cong
    $userExits = executeResult("SELECT * from  php_webshop.user where email = '$email'", true);
    if ($userExits != null) {
      $msg = 'Email đã được đăng ký trên hệ thống';
    } else {
      // insert user vào database
      $password = getSecurityMd5($password);
      $createad_at = $updated_at = 0;
      $sql =  "INSERT INTO php_webshop.user(fullname, email, password , role_id ) values('$fullname', '$email', '$password' , 1)";
      echo $sql;
      execute($sql);
      $msg = 'Đăng ký thành công';
      header('Location: login.php');
      die();
    }
  }
}
