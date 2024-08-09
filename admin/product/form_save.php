<?php
if (!empty($_POST)) {
  $id = getPost("id");
  $discount = getPost("discount") ? getPost("discount") : 0;
  $price = getPost("price") ? getPost("price") : 0;
  $description = getPost("description") ? getPost("description") : "Default";
  $category_id = getPost("category_id");
  $title = getPost("title");
  $thumbnail = moveFile("thumbnail");
  $created_at = date('Y-m-d H:i:s');
  $updated_at = date('Y-m-d H:s:i');

  if ($id > 0) {
    // update : 
    if ($thumbnail != '') {
      $sql = "UPDATE product SET discount = '$discount', price = '$price', description = '$description', category_id = $category_id, title = '$title' , thumbnail = '$thumbnail' , created_at = '$created_at' , updated_at = '$updated_at' where id = $id";
      execute($sql);
      header("Location:index.php");
      die();
    } else {
      $sql = "UPDATE product SET discount = '$discount', price = '$price', description = '$description', category_id = $category_id, title = '$title' , created_at = '$created_at' , updated_at= '$updated_at'  where id = $id";
      execute($sql);
      header("Location:index.php");
      die();
    }
  } else {
    // insert
    $sql = "INSERT INTO product (category_id, title, price , discount , thumbnail, description , deleted , created_at , updated_at)
      values ($category_id , '$title' , '$price' , '$discount' , '$thumbnail' , '$description' , 0 , '$created_at' , '$updated_at')";
    execute($sql);
    header("Location:index.php");
    die();
  }
}
