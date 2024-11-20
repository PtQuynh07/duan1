<!-- view/add_product.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <style>
        .mb-3 select {
    width: 100%; 
    padding: 10px; 
    font-size: 16px; 
    border: 1px solid #ced4da; 
    border-radius: 5px; 
    box-sizing: border-box; 
}

    </style>
    <script>
     
        function validateForm(event) {

            const productName = document.querySelector('[name="product_name"]').value;
            const description = document.querySelector('[name="description"]').value;
            const price = document.querySelector('[name="price"]').value;
            const stockQuantity = document.querySelector('[name="stock_quantity"]').value;
            const image = document.querySelector('[name="image_url"]').files[0];
            const createdAt = document.querySelector('[name="created_at"]').value;
            let errorMessage = "";

          
            if (productName === "") {
                errorMessage += "Tên sản phẩm không được để trống.\n";
            }

            if (price === "" || isNaN(price) || parseFloat(price) <= 0) {
                errorMessage += "Giá sản phẩm phải là một số hợp lệ.\n";
            }

          
            if (stockQuantity === "" || isNaN(stockQuantity) || parseInt(stockQuantity) <= 0) {
                errorMessage += "Số lượng tồn kho phải là một số hợp lệ.\n";
            }

          
            if (image && !image.type.startsWith('image/')) {
                errorMessage += "Vui lòng chọn một tệp hình ảnh hợp lệ.\n";
            }

          
            if (createdAt === "") {
                errorMessage += "Ngày tạo không được để trống.\n";
            }

          
            if (errorMessage !== "") {
                alert(errorMessage);
                event.preventDefault(); 
            }
        }
    </script>
</head>

<body>
    <?php include "./view/khung.php"; ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Sửa sản phẩm</h1>
                <div class="card p-4">
                    <div class="card-body">
                        <form action="?action=updateProduct&id=<?= $product['id']; ?>" method="POST" enctype="multipart/form-data" onsubmit="validateForm(event)">
                        <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục:</label>
                        <select name="category_id" required>
                              <option value="" hidden>Chọn danh mục</option>
                              <option value="1" <?= $product['category_id'] == 1 ? 'selected' : ''; ?>>1</option>
                              <option value="2" <?= $product['category_id'] == 2 ? 'selected' : ''; ?>>2</option>
                              <option value="3" <?= $product['category_id'] == 3 ? 'selected' : ''; ?>>3</option>
                              <option value="4" <?= $product['category_id'] == 4 ? 'selected' : ''; ?>>4</option>
                        </select>
                        </div>

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Tên sản phẩm:</label>
                                <input type="text" class="form-control"  name="product_name" value="<?= $product['product_name']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="product_featured" class="form-label">Sản phẩm nổi bật</label>
                                <select name="product_featured" required >
                                <option value="0" <?= $product['product_featured'] == 0 ? 'selected' : ''; ?>>0</option>
                                <option value="1" <?= $product['product_featured'] == 1 ? 'selected' : ''; ?>>1</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả:</label>
                                <input type="text" name="description" class="form-control" value="<?= $product['description']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="material" class="form-label">Chất liệu:</label>
                                <input type="text" name="material" class="form-control" value="<?= $product['material']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="image_url" class="form-label">Ảnh sản phẩm:</label>
                                <img src="../assets/images/product/default/home-1/<?= $images[0]['image_url']; ?>" alt="">
                                <input type="file" name="image_url" class="form-control">

                            </div>
                            

                            <div class="mb-3">
                                <label for="alt_text" class="form-label">Mô tả ảnh:</label>
                                <input type="text" name="alt_text" class="form-control" value="<?= $images[0]['alt_text']; ?>">
                            </div>

                            <div class="mb-3">
                              <label for="sku" class="form-label">Mã sản phẩm:</label>
                              <input type="text" name="sku" class="form-control" value="<?= $variants[0]['sku']; ?>">
                              </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Giá:</label>
                                <input type="text" name="price" class="form-control" value="<?= $variants[0]['price']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="stock_quantity" class="form-label">Số lượng tồn kho:</label>
                                <input type="number" name="stock_quantity" class="form-control" value="<?= $variants[0]['stock_quantity']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="option_color" class="form-label">Màu sắc:</label>
                                <input type="text" name="option_color" class="form-control" value="<?= $options[0]['option_color']; ?>">
                            </div>

                            <div class="mb-3">
                              <label for="option_size" class="form-label">Kích thước:</label>
                              <input type="text" name="option_size" class="form-control" value="<?= $options[0]['option_size']; ?>">
                              </div>

                            <div class="mb-3">
                                <label for="created_at" class="form-label">Ngày cập nhật:</label>
                                <input type="datetime-local" name="updated_at" class="form-control" required>

                            </div>

                            <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
</body>

</html>
