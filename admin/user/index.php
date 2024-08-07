<?php
$title = 'Dashboard Page';
$baseUrl = '../';
require_once('../layouts/header.php');


$sql = 'select user.* , role.name from user left join role on user.role_id = role.id where deleted = 0 ;';
$data = executeResult($sql);
?>
<div class="row" style="margin-top: 20px;">
  <div class="col-md-12 table responsive">
    <h3 class="mt-5">Dashboard - Quản Lý Người Dùng</h3>
    <a href="editor.php"><button class="btn btn-success">Thêm Tài Khoản</button></a>
    <table class="table table-bordered table-hover" style="margin-top: 20px;">
      <thead>
        <tr>
          <th>STT</th>
          <th>Họ & Tên</th>
          <th>Email</th>
          <th>Điện Thoại</th>
          <th>Địa chỉ</th>
          <th>Quyền</th>

          <th style="width: 50px">Hành động</th>
          <th style="width: 50px">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          $index = 0;
          foreach ($data as $item) {
            if ($item['deleted'] == 0) {
              echo '<tr>
              <th>' . (++$index) . '</th>
              <td>' . $item['fullname'] . '</td>
              <td>' . $item['email'] . '</td>
              <td>' . $item['phone']   . '</td>
              <td>' . $item['address']  . '</td>
              <td>' . $item['name'] . '</td>
              <td style="width: 50px">
                <a href="editor.php?id=' . $item['id'] . '"><button class="btn btn-warning">Sửa</button></a>
              </td>
              <td style="width: 50px">';
              // $user['id'] != $item['id'] : check dieu kien de xoa la chinh no
              if ($item['role_id'] == 1) {
                echo '<button onclick="deleteUser(' . $item['id'] . ')" class="btn btn-danger">Xoá</button>';
              }
              echo '
              </td>
            </tr>';
            }
          }
          ?>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  function deleteUser(id) {
    option = confirm('Bạn có chắc chắn muốn xoá tài khoản này không?')
    if (!option) return;
    $.post('form_api.php', {
      'id': id,
      'action': 'delete'
    }, function(data) {
      location.reload();
    })
  }
</script>


<?php require_once('../layouts/header.php') ?>