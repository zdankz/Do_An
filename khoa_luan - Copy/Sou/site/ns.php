<?php
session_start();
if(!isset($_SESSION['role']))
{   
    header("Location: login.php");
}
else {
    $ten_nha_si = "";
    $yeucau = $_GET['yeucau_ns'];
  if($yeucau == 1 ){ 
    $_SESSION['yeucau_ns'] = 1;
    $tiltle = "Thêm Nha Sĩ";
    $button = "CREATE";
    $id_nha_si = "0"; 
  }
  else if($yeucau == 2)
  {
    $_SESSION['yeucau_ns'] = 2;
    $tiltle = "Cập Nhật Thông Tin Nha Sĩ ";
    $id_nha_si = $_GET['id_nha_si'];
    $ten_nha_si = $_GET['ten_nha_si'];
    $button = "UPDATE";

  }
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
    <title><?php echo $tiltle;?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">QUẢN LÝ ĐẶT LỊCH<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="list_nha_si.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quay Lại</span></a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   <!--  <form
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
               <!-- ./process/dv_create.php -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $button; ?></h1> 
                      <form action="./process/ns_create.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="cars">Họ Tên Nha Sĩ</label>
                            <input type="text" name="hoten" placeholder="name" required="" class="form-control" value='<?php echo $ten_nha_si; ?>' >
                            <label for="">Giới Tính</label></br>
                           <input type="radio" id="male" name="gioitinh" value="Nam">
                            <label for="male">Nam</label><br>
                            <input type="radio" id="female" name="gioitinh" value="Nữ">
                            <label for="female">Nữ</label><br>
                            <small id="emailHelp" class="form-text text-muted">Vui lòng chọn giới tính</small>
                          </div>
                          <div class="form-group">
                            <label for="">Số Điện Thoại Của Nha Sĩ</label>
                            <input name="sdt" type="text" class="form-control"  id="exampleInputPassword1" placeholder="phone number">
                          </div>
                          <div class="form-group">
                            <label for="">Trình Độ Nha Sĩ</label>
                            <input name="trinhdo" value="" type="text" class="form-control" id="exampleInputPassword1" placeholder="trinh do">
                          </div>
                          <div class="form-group" >
                            <label for="">Giới Thiệu Sơ Lược</label>
                            <input name="gioithieu" value="" type="text" class="form-control" class="form-control" id="exampleInputPassword1" placeholder="" >
                          </div>
                          <div class="form-group" hidden="">
                            <label for="">Giới Thiệu Sơ Lược</label>
                            <input name="id_nha_si" value='<?php echo $id_nha_si;?>' type="text" class="form-control" class="form-control" id="exampleInputPassword1" placeholder="" >
                          </div>
                          <div class="form-group" >
                            <label for="">Lịch Làm Việc</label></br>
                            <input type="checkbox" id="vehicle1" name="lich[]"  value="Mon">Thứ 2
                            <input type="checkbox" id="vehicle1" name="lich[]"  value="Tue">Thứ 3
                            <input type="checkbox" id="vehicle1" name="lich[]"  value="Wed">Thứ 4 </br>
                            <input type="checkbox" id="vehicle1" name="lich[]"  value="Thu">Thứ 5
                            <input type="checkbox" id="vehicle1" name="lich[]"  value="Fri">Thứ 6
                            <input type="checkbox" id="vehicle1" name="lich[]"  value="Sat">Thứ 7
                            <input type="checkbox" id="vehicle1" name="lich[]"  value="Sun">Chủ Nhật
                            
                           
                          </div>
                           <div class="form-group" >
                            <label for="">Ảnh Đại Diện</label>
                            <input type="file" name="file" class="form-control">
                          </div>

                           <div class="form-check" hidden="">
                            <input type="text" class="form-check-input" id="exampleCheck1" value='<?php echo $id_dich_vu;?>'name="id_dich_vu">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div> 
                      <button type="submit" class="btn btn-primary"><?php echo $button;?></button>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <!-- <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div> -->
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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

</body>

</html>