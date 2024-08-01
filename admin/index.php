<?php
session_start();
require_once('../database/config.php');
require_once('../utils/utility.php');
$user = getUserToken();
if ($user == null) {
  header('Location: ./authen/login.php');
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Trang Quản trị </h3>
</body>

</html>