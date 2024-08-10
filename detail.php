<?php
require_once('layouts/header.php');

$productId = getGet('id');
$sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.id = $productId";
$product = executeResult($sql, true);

$category_id = $product['category_id'];
$sql = "select product.*, category.name as category_name from Product left join category on product.category_id = category.id where product.category_id = $category_id order by product.updated_at desc limit 0,4";

$lastestItems = executeResult($sql);
?>
<style type="text/css">
  .breadcrumb {
    background-color: transparent;
    padding: 0px;
  }

  .breadcrumb li {
    margin-right: 10px;
  }
</style>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <div class="row">
    <div class="col-md-6">
      <img src="<?= $product['thumbnail'] ?>" style="width: 100%;">
    </div>
    <div class="col-md-6">
      <ul class="breadcrumb">
        <li><a href="index.php">Trang Chủ</a></li>
        <li><a href="category.php?id=<?= $product['category_id'] ?>"> / <?= $product['category_name'] ?></a></li>
        <li> / <?= $product['title'] ?></li>
      </ul>
      <h2><?= $product['title'] ?></h2>
      <ul style="display: flex; list-style-type: none; margin: 0px; padding: 0px;">
        <li style="color: orange; font-size: 13pt; padding-top: 2px; margin-right: 5px;">5.0</li>
        <li style="color: orange; padding: 2px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
          </svg>
        </li>
        <!-- sao-->
        <li style="color: orange; padding: 2px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
          </svg>
        </li>
        <li style="color: orange; padding: 2px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
          </svg>
        </li>
        <li style="color: orange; padding: 2px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
          </svg>
        </li>
        <li style="color: orange; padding: 2px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
          </svg>
        </li>
        <li style="margin-left: 20px; border-left: solid #dad7d7 1px; font-size: 13pt; padding-top: 3px; padding-left: 20px;">7,635 Đã Bán</li>
      </ul>
      <p style="font-size: 30px; color: red; margin-top: 15px; margin-bottom: 15px;">
        <?= number_format($product['discount']) ?> VND
      </p>
      <p style="font-size: 15px; color: grey; margin-top: 15px; margin-bottom: 15px;">
        <del><?= number_format($product['price']) ?> VND</del>
      </p>
      <div style="display: flex;">
        <button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(-1)">-</button>
        <input type="number" name="num" class="form-control" step="1" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;" onchange="fixCartNum()">
        <button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(1)">+</button>
      </div>
      <button class="btn btn-success" style="margin-top: 20px; width: 100%; border-radius: 0px; font-size: 30px;" onclick="addCart(<?= $product['id'] ?>, $('[name=num]').val())">
        <i class="bi bi-cart-plus-fill"></i> THÊM VÀO GIỎ HÀNG
      </button>
      <button class="btn btn-secondary" style="margin-top: 20px; width: 100%; border-radius: 0px; font-size: 30px; background-color: #edebeb; border: solid #edebeb 1px; color: black;">
        <i class="bi bi-bookmark-heart-fill"></i> THÊM MỤC YÊU THÍCH
      </button>
    </div>
    <div class="col-md-12" style="margin-top: 20px; margin-bottom: 30px;">
      <h3>Chi Tiết Sản Phẩm</h3>
      <?= $product['description'] ?>
    </div>
  </div>
</div>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">SẢN PHẨM LIÊN QUAN</h1>
  <div class="row">
    <?php
    foreach ($lastestItems as $item) {
      echo '<div class="col-md-3 col-6 product-item">
					<a href="detail.php?id=' . $item['id'] . '"><img src="' . $item['thumbnail'] . '" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">' . $item['category_name'] . '</p>
					<a href="detail.php?id=' . $item['id'] . '"><p style="font-weight: bold;">' . $item['title'] . '</p></a>
					<p style="color: red; font-weight: bold;">' . number_format($item['discount']) . ' VND</p>
					<p><button class="btn btn-success" onclick="addCart(' . $item['id'] . ', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
    }
    ?>
  </div>
</div>

<script type="text/javascript">
  function addMoreCart(delta) {
    num = parseInt($('[name=num]').val())
    num += delta
    if (num < 1) num = 1;
    $('[name=num]').val(num)
  }

  function fixCartNum() {
    $('[name=num]').val(Math.abs($('[name=num]').val()))
  }
</script>
<?php
require_once('layouts/footer.php');
?>