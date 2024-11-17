
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản trị danh mục</title>
  <style>
    .table {
      width: 100%;
      /* Make the table take up the full width of its container */
      max-width: 800px;
      /* Limit the max width */
      margin: 20px auto;
      /* Center the table */
      border-collapse: collapse;
      /* Remove space between cells */
      font-family: Arial, sans-serif;
      /* Font style */
      font-size: 16px;
      /* Increase font size */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      /* Soft shadow around the table */
      margin-top: -1px;
    }

    .table th,
    .table td {
      padding: 15px;
      /* Padding for cells */
      text-align: center;
    }

    .table thead {
      background-color: #4d79ff;
      /* Blue header */
      color: #ffffff;
      /* White text in the header */
    }

    .table th {
      text-transform: uppercase;
      /* Make headers uppercase */
      font-weight: bold;
      text-align: center;
    }

    .table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
      /* Light grey for even rows */
    }

    .table tbody tr:hover {
      background-color: #e0e0e0;
      /* Slightly darker grey on hover */
    }

    .table td {
      border: 1px solid #ddd;
      /* Light border for cells */
    }

    .table-bordered {
      border: 2px solid #007bff;
      /* Border around the table */
      border-radius: 8px;
      /* Rounded corners */
    }
    .button{
      margin: 25px 0 15px 0 ;
    }
    
  </style>
</head>

<body>
  <?php
      include "./view/khung.php";
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Danh mục</h1>
        <div class="button"><a href="?action=addDanhmuc"><button type="button" class="btn btn-danger">Thêm danh mục</button></a></div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Tên danh mục</th>
              <th scope="col">Ngày tạo</th>
              <th scope="col">Ngày cập nhật</th>
              <th>Sửa</th>
              <th>Xóa</th>
            
            </tr>
          </thead>
          <?php
          if (isset($danhmucs) && is_array($danhmucs)) {
            foreach ($danhmucs as $danhmuc) {
          ?>
              <tbody>
                <tr>
                  <td scope="row"><?php echo $danhmuc['id'] ?></td>
                  <td><?php echo $danhmuc['category_name'] ?></td>
                  <td><?php echo $danhmuc['created_at'] ?></td>
                  <td><?php echo $danhmuc['updated_at'] ?></td>
                  <td><a href="?action=editDanhmuc&id=<?php echo $danhmuc['id'] ?>"><i class="fa-solid fa-screwdriver-wrench" style="color: #000000;"></i></a></td>
                  <td><a onclick="return confirm('Bạn có muốn xóa danh mục sản phẩm không?')" href="?action=deleteDanhmuc&id=<?php echo $danhmuc['id'] ?>"><i class="fa-solid fa-trash-can" style="color: #ff3d3d;"></i></a></td>
                 
                </tr>
              </tbody>
          <?php
            }
          }
          ?>
        </table>
      </div>
    </div>
  </div><!-- /.col -->
</body>

</html>