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
    $item = executeResult($sql, true);
    if ($item != null) {
      $userId = $item['user_id'];
      $sql = "SELECT * FROM user WHERE id = '$userId' and deleted = 0";
      $item = executeResult($sql);
      if ($item != null) {
        $_SESSION['user'] = $item;
        return $item;
      }
    }
    return null;
  }
}

function moveFile($key, $rootPath = "../../")
{
  if (!isset($_FILES[$key]) || !isset($_FILES[$key]['name']) || $_FILES[$key]['name'] == '') {
    return '';
  }

  $pathTemp = $_FILES[$key]["tmp_name"];

  $filename = $_FILES[$key]['name'];
  //filename -> remove special character, ..., ...

  $newPath = "assets/photos/" . $filename;



  move_uploaded_file($pathTemp, $rootPath . $newPath);

  return $newPath;
}


function fixUrl($thumbnail, $rootPath = "../../")
{
  if (stripos($thumbnail, 'http://') !== false || stripos($thumbnail, 'https://') !== false) {
    // Nếu thumbnail chứa 'http://' hoặc 'https://', nó là URL đầy đủ và không cần thay đổi.
    // trường hợp ảnh trên mạng và trường hợp tải ảnh về 
  } else {
    // Nếu không chứa 'http://' hoặc 'https://', prepend $rootPath để tạo URL đầy đủ.
    $thumbnail = $rootPath . $thumbnail;
  }

  return $thumbnail;
}
