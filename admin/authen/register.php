<?php
require_once('../../utils/utility.php');
require_once('../../database/config.php');
require_once('../../database/dbhelper.php');
require_once('./process_form_register.php');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form * Form Tutorial</title>

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
    <div class="panel panel-primary panel__color" style="width: 480px; margin: 0 auto; margin-top: 50px; background-color: white; padding: 10px; border-radius: 5px;">
      <div class="panel-heading">
        <h2 class="text-center title--header__color">Đăng Ký Tài Khoản</h2>
        <h3 class="text-center" style="color:red;"><?= htmlspecialchars($msg) ?></h3>
      </div>
      <form action="" method="post" onsubmit="return validationForm();">
        <div class="panel-body">
          <div class="form-group">
            <label for="usr">Họ & Tên</label>
            <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?= htmlspecialchars($fullname) ?>">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input required="true" type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
          </div>
          <div class="form-group">
            <label for="password">Mật Khẩu:</label>
            <input required="true" type="password" class="form-control" id="password" name="password" minlength="6">
          </div>
          <div class="form-group">
            <label for="confirmation_pwd">Nhập Lại Mật Khẩu:</label>
            <input required="true" type="password" class="form-control" id="confirmation_pwd" name="confirm_password" minlength="6">
          </div>
          <div><a href="login.php">Tôi đã có tài khoản</a></div>
          <button type="submit" class="btn btn-success">Đăng Ký</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Corrected script tag -->
  <script type="text/javascript">
    function validationForm() {
      var pwd = $('#password').val();
      var confirmation_pwd = $('#confirmation_pwd').val();
      if (pwd !== confirmation_pwd) {
        alert('Mật khẩu và nhập lại mật khẩu phải trùng nhau.');
        return false;
      }
      return true;
    }
  </script>
</body>

</html>