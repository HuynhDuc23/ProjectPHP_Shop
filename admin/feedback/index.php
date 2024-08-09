<?php
$title = 'Feedback Page';
$baseUrl = '../';
require_once('../layouts/header.php');

$sql = "select * from feedback order by status asc , updated_at desc";
$data = executeResult($sql);
?>
<div class="row" style="margin-top: 60px;">
  <div class="col-md-12 table-responsive">
    <h3>Quản Lý Phản hồi</h3>

    <table class="table table-bordered table-hover" style="margin-top: 20px;">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên</th>
          <th>Họ</th>
          <th>Tiêu đề</th>
          <th>Điện thoại</th>
          <th>Ghi chú</th>
          <th>Trạng Thái</th>
          <th style="width: 50px"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $index = 0;
        foreach ($data as $item) {
          echo '<tr>
					<th>' . (++$index) . '</th>
          <th>' . ($item['firstname']) . '</th>
					<th>' . ($item['lastname']) . '</th>
          <th>' . ($item['email']) . '</th>
          <th>' . ($item['phone_number']) . '</th>
          <th>' . ($item['subject_name']) . '</th>
          <th>' . ($item['note']) . '</th>
					<td style="width: 50px"> ';
          if ($item['status'] == 0) {
            echo '<button onclick="deleteMark(' . $item['id'] . ')" class="btn btn-danger">Đọc</button>';
          }
          echo '
				 </td>
				</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  function deleteMark(id) {
    $.post('form_api.php', {
      'id': id,
      'action': 'mark'
    }, function(data) {
      location.reload();
    })
  }
</script>

<?php require_once('../layouts/header.php') ?>