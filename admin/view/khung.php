<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản trị</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Your content goes here -->
</div>
<!-- jQuery -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="./assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>



<!-- AdminLTE App -->
<script src="./assets/dist/js/adminlte.min.js"></script>
<!-- Your custom scripts -->
<script src="./assets/dist/js/custom.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
            <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i> <!-- This is the hamburger icon -->
                  </a>
                </li>
                
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Website</a>
        </li>
      </ul>
    
      <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

   
      <!-- Notifications Dropdown Menu -->
    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item">
            <a class="nav-link" href="#" onclick="return confirm('Bạn có  muốn đăng xuất?')">
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </li>
    
    </ul>
    </nav>
    
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <span class="brand-text font-weight-light ">ADMIN</span>
      </a>
    
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://img.pikbest.com/png-images/qiantu/cartoon-creative-game-character-round-face-monster-decoration-design_2598202.png!f305cw" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="?action=home" class="d-block">Phạm Minh Quang</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
       
                   <li class="nav-item">
                        <a href="?action=sanpham" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                            Quản lý sản phẩm
                           
                          </p>
                        </a>
                      </li>
            
                      <li class="nav-item">
                        <a href="?action=danhmuc" class="nav-link">
                              <i class="fa-solid fa-list"></i>
                          <p>
                            Quản lý danh mục
                           
                          </p>
                        </a>
                      </li>
            
                      <li class="nav-item">
                        <a href="#" class="nav-link ">
                              <i class="fa-solid fa-user"></i>
                          <p>Quản lí tài khoản</p>        
                            <i class="right fas fa-angle-left"></i>        
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="?action=user" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                              <p>Tài khoản quản trị</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="?action=client" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                              <p>Tài khoản khách hàng</p>
                            </a>
                          </li>
                          </ul>
                      </li>
            
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class='fas fa-cart-arrow-down'></i>
                          <p>
                            Quản lý đơn hàng
                           
                          </p>
                        </a>
                      </li>
            
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                              <i class="fa-solid fa-chart-line"></i>
                          <p>
                           Thống kê
                           
                          </p>
                        </a>
                      </li>
            
                </ul>
              </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    
  <!-- jQuery -->
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="./assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="./assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="./assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="./assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="./assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="./assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="./assets/plugins/jszip/jszip.min.js"></script>
  <script src="./assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="./assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="./assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="./assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="./assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./assets/dist/js/demo.js"></script>