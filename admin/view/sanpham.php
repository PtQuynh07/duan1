<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .table {
  width: 100%; 
  max-width: 800px; 
  margin: 20px auto; 
  border-collapse: collapse; 
  font-family: Arial, sans-serif; 
  font-size: 16px; 
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
  text-align: center;
}

.table th,
.table td {
  padding: 15px; 
  text-align: left;
  text-align: center;
}

.table thead {
  background-color: #4d79ff; 
  color: #ffffff; 
}

.table th {
  text-transform: uppercase; 
  font-weight: bold;
  
}

.table tbody tr:nth-child(even) {
  background-color: #f2f2f2; 
}

.table tbody tr:hover {
  background-color: #e0e0e0; 
}

.table td {
  border: 1px solid #ddd; 
}

.table-bordered {
  border: 2px solid #007bff; 
  border-radius: 8px; 
}
img{
      width: 150px;
      height: 100px;
      margin: 0 15px ;

}

.button{
      margin: 25px 0 15px 0 ;
    }

    </style>
</head>
<body>
    <?php
       include './view/khung.php';
    ?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
      <div class="container-fluid">
      <h1 class="m-0">Sản phẩm</h1>
      <div class="button"><a href="?action=addSanpham"><button type="button" class="btn btn-danger">Thêm sản phẩm</button></a></div>
            <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Catogery</th>
      <th scope="col"> Product Name</th>
      <th scope="col">Product img</th>
     
      <th scope="col">material</th>
      <th scope="col">sku</th>
      <th scope="col">price</th>
      <th scope="col">color</th>
      <th scope="col">size</th>
      <th scope="col">quantily</th>
    
      <th scope="col">sửa</th>
      <th scope="col">xóa</th>
    </tr>
  </thead>
  <tbody>
  <?php
            
            foreach ( $allsanpham as $key=>$row) {
            ?>

                  <tr>
                        <td><?= $row['id']  ?></td>
                        
                        <td><?= $row['category_name']  ?></td>

                        <td><?= $row['product_name']  ?></td>
                     
                        <td>
                        <img src="../assets/images/product/default/home-1/<?= $row['image_url'] ?>" alt="Product Image">
                        </td>

                        <td><?= $row['material']  ?></td>

                        <td><?= $row['sku']  ?></td>

                        <td><?= $row['price']  ?></td>

                        <td><?= $row['option_color']  ?></td>

                        <td><?= $row['option_size']  ?></td>

                        <td><?= $row['stock_quantity']  ?></td>
                        
                        <td><a href="?action=editProduct&id=<?= $row['id']  ?>"><i class="fa-solid fa-screwdriver-wrench" style="color: #000000;"></i></a></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa  sản phẩm không?')" href="?action=deleteSanpham&id=<?= $row['id']  ?>"><i class="fa-solid fa-trash-can" style="color: #ff3d3d;"></i></a></td>
                        
                  </tr>
            <?php
            }
            ?>
   
   
  </tbody>
</table>
      </div>
    </div>
    <!-- <img src="../assets/images/product/default/home-1/default-1.jpg" alt=""> -->
</body>
</html>