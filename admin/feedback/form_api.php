<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if ($user == null) {
  die();
}

if (!empty($_POST)) {
  $action = $_POST['action'];
  switch ($action) {
    case 'mark':
      deleteMark();
      break;
  }
}
function deleteMark()
{
  $id = getPost('id');
  $updated_at = date('Y-m-d H:i:s');
  $sql = "UPDATE feedback set status = 1, updated_at = '$updated_at' WHERE id = $id";
  execute($sql);
}
