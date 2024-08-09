<?php
$title = 'Product Page';
$baseUrl = '../';
require_once('../layouts/header.php');

$sql = "select product.* , category.name from product left join category on product.category_id = category.id where product.deleted = 0 ;";
$data = executeResult($sql);

?>
<div class="row" style="margin-top: 60px;">
  <div class="col-md-12 table-responsive">
    <h3>Quản Lý Sản Phẩm</h3>

    <a href="editor.php"><button class="btn btn-success">Thêm Sản Phẩm</button></a>

    <table class="table table-bordered table-hover" style="margin-top: 20px;">
      <thead>
        <tr>
          <th>STT</th>
          <th>Thumbnail</th>
          <th>Tên Sản Phẩm</th>
          <th>Giá</th>
          <th>Danh Mục</th>
          <th style="width: 50px"></th>
          <th style="width: 50px"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $index = 0;
        foreach ($data as $item) {
          if ($item['deleted'] == 0) {
            echo '<tr>
					<th>' . (++$index) . '</th>
					<td><img src="' . fixUrl($item['thumbnail']) . '" style="height: 100px"/></td>
					<td>' . $item['title'] . '</td>
					<td>' . number_format($item['discount']) . ' VNĐ</td>
					<td>' . $item['name'] . '</td>
					<td style="width: 50px">
						<a href="editor.php?id=' . $item['id'] . '"><button class="btn btn-warning">Sửa</button></a>
					</td>
					<td style="width: 50px">
						<button onclick="deleteProduct(' . $item['id'] . ')" class="btn btn-danger">Xoá</button>
					</td>
				</tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  function deleteProduct(id) {
    option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
    if (!option) return;

    $.post('form_api.php', {
      'id': id,
      'action': 'delete'
    }, function(data) {
      location.reload()
    })
  }
</script>


<?php require_once('../layouts/header.php') ?>