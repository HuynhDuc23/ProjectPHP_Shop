<?php

if (!empty($_POST)) {
  $id =  getPost('id');
  $fullname = getPost('fullname');
  $email = getPost('email');
  $phone = getPost('phone');
  $address = getPost('address');
  $password = getPost('password');
  if ($password != '') {
    $password = getSecurityMd5($password);
  }
  $created_ad = $updated_ad = date('Y-m-d H:i:s');
  $role_id = getPost('role_id');
  // update
  if ($id > 0) {
    $sql = "select * from user where email = '$email' and id <> '$id'";
    $userItem = executeResult($sql, true);
    if ($userItem != null) {
      $msg = 'Email đã tồn tại, vui lòng nhập email khác';
    } else {

      if ($password != '') {
        $sql = "UPDATE user SET fullname = '$fullname', email = '$email', phone = '$phone', address = '$address', password = '$password', role_id = '$role_id' WHERE id = '$id'";
      } else {
        $sql = "UPDATE user SET fullname = '$fullname', email = '$email', phone = '$phone', address = '$address', role_id = '$role_id' WHERE id = '$id'";
      }
      execute($sql);
      header('Location: index.php');
      die();
    }
    // < = 0
  } else {
    // insert
    $sql = "select * from user where email = '$email'";
    $itemData = executeResult($sql, true);
    if ($itemData == null) {
      // insert .
      $sql = "INSERT INTO user (fullname, email, phone, address, password, deleted, role_id) 
       VALUES ('$fullname', '$email', '$phone', '$address', '$password', 0, '$role_id')";
      echo $sql;
      execute($sql);
      header('Location: index.php');
      die();
    } else {
      $msg = 'Email đã tồn tại, vui lòng nhập email khác';
    }
  }
}
