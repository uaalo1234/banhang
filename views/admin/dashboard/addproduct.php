
<?php require_once('views/admin/dashboard/index.php') ?>
<?php require_once('app/Models/Category.php');?>
<?php require_once('app/Models/Brand.php');?>

<?php startblock('title') ?>
Dashboard
<?php endblock() ?>

<?php startblock('content') ?>
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
              <h3 class="mb-0">Thêm sản phẩm</a></h3>
      </div>
      <div class="card-header border-0">
        <form action="<?php echo url('admin/product/add_product') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Danh mục sản phẩm</label>
              <select class="form-control" name="categoryId">
                <?php foreach($categories as $category) : ?>
                <option value='<?php echo $category['id'] ?>'><?php echo $category['categoryName'] ?></option>
                <?php endforeach; ?>
              </select><br>
                </div>
              <div class="form-group">
              <label for="exampleFormControlSelect1">Thương hiệu</label>
              <select class="form-control" name="brandId">
                <?php foreach($brands as $brand) : ?>
                <option value='<?php echo $brand['id'] ?>'><?php echo $brand['brandName'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Tên sản phẩm</label>
              <input type="text" class="form-control" name="productName" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Giá tiền</label>
              <input type="text" class="form-control" name="price" placeholder="Nhập giá tiền">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Giảm giá</label>
              <input type="text" class="form-control" name="discount" placeholder="Giảm giá">
            </div>
            <div class="custom-file">
                <label placeholder="Chọn ảnh">Chọn ảnh</label>
                <input type="file" name="thumbnail" >
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Mô tả</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Kích cỡ</label>
              <input type="text" class="form-control" name="size" placeholder="Nhập size">
            </div>    
            <div class="form-group">
              <label for="exampleFormControlSelect1">Tình trạng</label>
              <select class="form-control" name="types">          
                <option value="0" >Featured</option>
                <option value="1" >Non-Featured</option>
              </select>
            </div>

          <button class="btn btn-primary" type="submit">Tạo sản phẩm</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>

</script>
<?php endblock() ?>
