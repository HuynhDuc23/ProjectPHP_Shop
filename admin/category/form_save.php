<?php
if (!empty($_POST)) {
  $id = getPost('id');
  $name = getPost('name');

  if ($id > 0) {
    $sql = "UPDATE category SET name = '$name' WHERE id = '$id'";
    execute($sql);
    header("Location: index.php?");
  } else {
    $sql = "INSERT INTO category (name) VALUES ('$name')";
    execute($sql);
    header("Location: index.php?");
  }
}
