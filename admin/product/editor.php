<?php
$title = 'Thêm/Sửa Sản Phẩm';
$baseUrl = '../';
require_once('../layouts/header.php');

$id = $name = $discount =  $price = $description = $image = $category_id = $title = $thumbnail = "";
require_once('form_save.php');
$id = getGet('id');
if ($id != '' && $id > 0) {
  $sql = "select product.* from product where id = '$id' and deleted = 0 ;";
  $product = executeResult($sql, true);
  if ($product != null) {
    $discount = $product['discount'];
    $price = $product['price'];
    $description = $product['description'];
    $image = $product['image'];
    $category_id = $product['category_id'];
    $title = $product['title'];
    $thumbnail = $product['thumbnail'];
  } else {
    $id = 0;
  }
} else {
  $id = 0;
}
$sql = "select * from category ";
$data = executeResult($sql);
?>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="row" style="margin-top: 60px;">
  <div class="col-md-12 table-responsive">
    <h3>Thêm/Sửa Sản Phẩm</h3>
    <div class="panel panel-primary">
      <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-9 col-12">
              <div class="form-group">
                <label for="usr">Tên Sản Phẩm:</label>
                <input required="true" type="text" class="form-control" id="usr" name="title" value="<?= $title ?>">
                <input type="text" name="id" value="<?= $id ?>" hidden="true">
              </div>
              <div class="form-group">
                <label for="pwd">Nội Dung:</label>
                <textarea class="form-control" rows="5" name="description" id="description"><?= $description ?></textarea>
              </div>

              <button class="btn btn-success">Lưu Sản Phẩm</button>
            </div>
            <div class="col-md-3 col-12" style="border: solid grey 1px; padding-top: 10px; padding-bottom: 10px;">
              <div class="form-group">
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                <img id="thumbnail_img" src="<?= fixUrl($thumbnail) ?>" style="max-height: 160px; margin-top: 5px; margin-bottom: 15px;">
              </div>

              <div class="form-group">
                <label for="usr">Danh Mục Sản Phẩm:</label>
                <select class="form-control" name="category_id" id="category_id" required="true">
                  <option value="">-- Chọn --</option>
                  <?php
                  foreach ($data as $item) {
                    if ($item['id'] == $category_id) {
                      echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                    } else {
                      echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="price">Giá:</label>
                <input required="true" type="number" class="form-control" id="price" name="price" value="<?= ($price)  ?>">
              </div>
              <div class="form-group">
                <label for="discount">Giảm Giá:</label>
                <input required="true" type="text" class="form-control" id="discount" name="discount" value="<?= ($discount) ?>">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $('#description').summernote({
    placeholder: 'Nhập nội dung dữ liệu',
    tabsize: 2,
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>
<?php
require_once('../layouts/footer.php');
?>