<?php
require_once('../../utils/utility.php');
require_once('../../database/config.php');
require_once('../../database/dbhelper.php');
require_once('./process_form_login.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Registation Form * Form Tutorial</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="panel panel-primary panel__color" style="width : 480px ; margin: 0px auto ; margin-top:50px; background-color : white ; padding :10px; border-radius:5px;">
      <div class="panel-heading">
        <h2 class="text-center title--header__color">Đăng Nhập Tài Khoản</h2>
        <h3 class="text-center" style="color:red;"><?= $msg ?></h3>
      </div>
      <form action="" method="post">
        <div class="panel-body">
          <div class="form-group">
            <label for="email">Email:</label>
            <input required="true" type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
          </div>
          <div class="form-group">
            <label for="pwd">Mật Khẩu:</label>
            <input required="true" type="password" class="form-control" id="pwd" name="password" minlength="6" value="<?= $password ?>">
          </div>
          <div><a href="register.php">Đăng ký tài khoản</a></div>
          <button class="btn btn-success">Đăng Nhập</button>
        </div>

      </form>

    </div>
  </div>
</body>

</html>