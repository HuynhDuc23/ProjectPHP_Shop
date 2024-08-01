<?php
function fixSqlinjection($sql)
{
  $sql = str_replace('\\', '\\\\', $sql);
  $sql = str_replace('\'', '\\\'', $sql);
  return trim($sql);
}

function getGet($key)
{
  $value = '';
  if (isset($_GET[$key])) {
    $value = $_GET[$key];
    $value = fixSqlInjection($value);
  }
  return trim($value);
}
function getPost($key)
{
  $value = '';
  if (isset($_POST[$key])) {
    $value = $_POST[$key];
    $value = fixSqlInjection($value);
  }
  return trim($value);
}
function getCookie($key)
{
  $value = '';
  if (isset($_COOKIE[$key])) {
    $value = $_COOKIE[$key];
    $value = fixSqlInjection($value);
  }
  return trim($value);
}
function getSecurityMd5($password)
{
  return md5(md5($password . PRIVATE_KEY));
}
function getUserToken()
{
  if (isset($_SESSION['user'])) {
    return $_SESSION['user'];
  } else {
    $token = getCookie('token');
    $sql = "SELECT * FROM tokens Where token = '$token'";
    $item = executeResult($sql);
    if ($item != null) {
      $userId = $item['user_id'];
      $sql = "SELECT * FROM user WHERE id = '$userId'";
      $item = executeResult($sql);
      if ($item != null) {
        $_SESSION['user'] = $item;
        return $item;
      }
    }
    return null;
  }
}
