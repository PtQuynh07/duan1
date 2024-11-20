<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục</title>
</head>
<body>
    <?php
      include "./view/khung.php";
      ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Thêm Danh Mục</h1>
                <div class="content-header">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="?action=pushDanhmuc" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên danh mục:</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên danh mục..." name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ngày tạo:</label>
                                    <input type="datetime-local" name="created_at" id="" class="form-control" required>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="name" class="form-label">Ngày cập nhật:</label>
                                    <input type="datetime-local" name="updated_at" id="" class="form-control">
                                </div> -->
                                <button type="submit" class="btn btn-primary" name="addDanhmuc">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
</body>

</html>