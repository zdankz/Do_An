<?php 
require "process/prcess_search.php";
if($obj == "Khách Hàng"){

}elseif ($obj == "Nha Sĩ") {
    # code...
} elseif ($obj == "Đơn Đặt Lịch") {
    # code...
} elseif ($obj == "Nhóm Dịch Vụ Và Dịch Vụ") {
    # code...
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tìm Kiếm</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet"> 
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
               <!--  <div class="sidebar-brand-text mx-3">QUẢN LÝ ĐẶT LỊCH<sup></sup></div> -->
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quay Lại</span></a>
            </li>
            <hr class="sidebar-divider">
             <div class="sidebar-heading">
                Danh mục quản lý
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tra Cứu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tìm kiếm theo </h6>
                        <a class="collapse-item" href="search.php?yc=k_h">Khách Hàng</a>
                         <a class="collapse-item" href="search.php?yc=n_s">Nha Sĩ</a>
                        <a class="collapse-item" href="search.php?yc=ndv">Nhóm Dịch Vụ</a>
                         <a class="collapse-item" href="search.php?yc=dv">Dịch Vụ</a>
                       
                    </div>
                </div>
            </li>

           
            <hr class="sidebar-divider">

            
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <!-- <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form> -->
                                       <!-- Topbar Search -->
                    <!-- <form  
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $role; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                              
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng Xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tìm Kiếm Thông Tin <?php echo $obj; ?></h1>
                    <p class="mb-4"><a target="_blank"
                            href="">VietHan Dental</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" >
                          <!--   <h6 class="m-0 font-weight-bold text-primary">Hiện có</h6> -->
                            <form  
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                                <input hidden="" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" name="yc" value='<?php echo $_GET['yc'];?>'>
                            <div class="input-group-append">
                                <!-- <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button> -->
                                <input class="btn btn-primary" type="submit" name="submit" value='submit'><!-- <i class="fas fa-search fa-sm"></i> -->
                            </div>
                        </div>
                    </form>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- ===========KHACH Hang================= -->
                                            <?php
                                            if($obj == "Khách Hàng"){
                                                echo "<th> id_khach_hang</th>";
                                                echo "<th> so_dien_thoai</th>";
                                                echo "<th> ho_ten_khach_hang</th>";
                                            }
                                            else if($obj == "Nha Sĩ"){
                                                echo "<th> id_nha_si</th>";
                                                echo "<th> ho_ten_nha_si</th>";
                                                echo "<th> gioi_tinh_nha_si</th>";
                                                echo "<th> so_dien_thoai_nha_si</th>";
                                                echo "<th> trinh_do_nha_si</th>";
                                                echo "<th> gioi_thieu_nha_si</th>";
                                                echo "<th> hinh_anh_nha_si</th>";
                                            }
                                            else if($obj == "Nhóm Dịch Vụ Và Dịch Vụ"){
                                                echo "<th> id_nhom_dich_vu</th>";
                                                echo "<th> ten_nhom_dich_vu</th>";
                                                echo "<th> mota_nhom_dich_vu</th>";                
                                            }
                                            else if($obj == "Dịch Vụ"){
                                                echo "<th> id_dich_vu</th>";
                                                echo "<th> ten_dich_vu</th>";
                                                echo "<th> mota_dich_vu</th>";
                                                echo "<th> chiphi_dich_vu</th>";
                                                echo "<th> thoi_gian_uoc_tinh</th>";
                                                echo "<th> hinh_anh_dich_vu</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>                                   
                                    <tbody id="data">
                                        <?php
                                            if(isset($result) && $obj == "Khách Hàng"){
                                             while($row = mysqli_fetch_array($result)) 
                                            {
                                                echo "<tr>";
                                                echo "<td>" . $row['id_khach_hang'] . "</td>";
                                                echo "<td>" . $row['so_dien_thoai'] . "</td>";
                                                echo "<td>" . $row['ho_ten_khach_hang'] . "</td>";
                                                echo "</tr>";
                                            }    
                                            }   
                                            if(isset($result) && $obj == "Nha Sĩ"){
                                            while($row = mysqli_fetch_array($result)) 
                                            {
                                                echo "<tr>";
                                                echo "<td>" . $row['Id_nha_si'] . "</td>";
                                                echo "<td>" . $row['ho_ten_nha_si'] . "</td>";
                                                echo "<td>" . $row['gioi_tinh_nha_si'] . "</td>";
                                                echo "<td>" . $row['so_dien_thoai_nha_si'] . "</td>";
                                                echo "<td>" . $row['trinh_do_nha_si'] . "</td>";
                                                echo "<td>" . $row['gioi_thieu_nha_si'] . "</td>";
                                                echo "<td> <img class='img-fluid px-3 px-sm-4 mt-3 mb-4' style='width: 25rem;' src='". $row['hinh_anh_nha_si'] ."' alt=''></td>";      
                                                echo "</tr>";
                                            }  
                                            }
                                            if(isset($result) && $obj == "Nhóm Dịch Vụ"){
                                            while($row = mysqli_fetch_array($result)) 
                                            {
                                                echo "<tr>";
                                                echo "<td>" . $row['id_nhom_dich_vu'] . "</td>";
                                                echo "<td>" . $row['ten_nhom_dich_vu'] . "</td>";
                                                echo "<td>" . $row['mota_nhom_dich_vu'] . "</td>";
                                                echo "</tr>";
                                            }  
                                            }
                                            if(isset($result) && $obj == "Dịch Vụ"){
                                            while($row = mysqli_fetch_array($result)) 
                                            {
                                                echo "<tr>";
                                                echo "<td>" . $row['id_dich_vu'] . "</td>";
                                                echo "<td>" . $row['ten_dich_vu'] . "</td>";
                                                echo "<td>" . $row['mota_dich_vu'] . "</td>";
                                                echo "<td>" .  product_price($row['chiphi_dich_vu']) . "</td>";
                                                echo "<td>" . $row['thoi_gian_uoc_tinh'] . "</td>";
                                                echo "<td> <img class='img-fluid px-3 px-sm-4 mt-3 mb-4' style='width: 25rem;' src='". $row['hinh_anh_dich_vu'] ."' alt=''></td>";      
                                                echo "</tr>";
                                            }  
                                            }
                                            ?>
                                      
                                    </tbody>
                                </table>
                            </div>

                         
                        </div>
                    </div>

                </div>            

            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn Có Chắc Muốn Rời Khỏi Chứ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Click "Logout" Để Đăng Xuất</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="process/process_logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>   

</body>

</html>