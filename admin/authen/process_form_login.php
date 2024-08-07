<?php
$password = $email = $msg = '';
if (!empty($_POST)) {
  $email = getPost('email');
  $password = getPost('password');
  $password = getSecurityMd5($password);
  $sql = "SELECT * from php_webshop.user where email='$email' and password='$password'";
  $userExits = executeResult($sql, true);
  if ($userExits == null) {
    $msg = "Tài Khoản Hoặc Mật Khẩu không chính xác vui lòng kiểm tra lại ";
  } else {

    $_SESSION['user'] = $userExits;
    $token = getSecurityMd5($userExits["email"] . time());
    setcookie("token", $token, time() + 7 * 24 * 60 * 60, "/");
    $userId = $userExits['id'];
    $sql = "INSERT INTO php_webshop.tokens (user_id , token) VALUES ('$userId', '$token')";
    execute($sql);
    header("Location: ../index.php");
    die();
  }
}
