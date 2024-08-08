<?php
session_start();
require_once('../../database/config.php');
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');
$user = getUserToken();
if ($user == null) {
  die();
}
if (!empty($_POST)) {
  $action = getPost('action');
  switch ($action) {
    case 'delete':
      deleteCategory();
      break;
  }
}
function deleteCategory()
{
  $id = getPost('id');
  $sql = "select count(*) as total from product where category_id = $id";
  echo $sql;
  $count = executeResult($sql, true);
  if ($count['total'] > 0) {
    echo 'Danh mục đang chứa sản phẩm, không được xoá!!!';
    die();
  }
  $sql = "delete from category where id = '$id'";

  execute($sql);
}
