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
