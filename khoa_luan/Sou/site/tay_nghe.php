<?php 
session_start();
require "API/get_count_don.php";
$id_nha_si = $_GET['idns'];
if(!isset($_SESSION['role'])){
header("Location: login.php");
}
if($_SESSION['role'] ==1 ){
    $role = "Admin";
    $xem = "";
}else {
    $role = "Sales";
    $xem = "hidden=''";
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

    <title>Tay Nghề Nha Sĩ</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

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
                <div class="sidebar-brand-text mx-3">QUẢN LÝ ĐẶT LỊCH<sup></sup></div>
            </a>

           
            <hr class="sidebar-divider my-0">

           
            <!-- <li class="nav-item">
                <a class="nav-link" href="#" onclick="close_window();return false;">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Thoát</span></a>
            </li> -->

           
            <!-- <hr class="sidebar-divider"> -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Danh Mục Quản Lý
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Danh Mục</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Dữ liệu hiện có</h6>
                        <a class="collapse-item" href="list_nhom_dich_vu.php">Nhóm Dịch Vụ</a> <a class="collapse-item" href="list_dich_vu.php">Dịch Vụ</a>
                        <a class="collapse-item" href="list_nha_si.php">Nha Sĩ</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Tác Vụ</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chính Sách Quản Lý</h6>
                        <a class="collapse-item" href="utilities-color.html">Thay Đổi Password</a>
                        <!-- <a class="collapse-item" href="utilities-border.html"> Nhóm Dịch Vụ</a>
                        <a class="collapse-item" href="utilities-animation.html">Thêm</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a> -->
                    </div>
                </div>
            </li>

          
            
            
            <hr class="sidebar-divider d-none d-md-block">

            
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        
        <div id="content-wrapper" class="d-flex flex-column">

            
            <div id="content">

                
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                   
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    
                    <form
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
                    </form>

                    
                    <ul class="navbar-nav ml-auto">

                       
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            
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
                               <!--  <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
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
                    <h1 class="h3 mb-2 text-gray-800">Tay Nghề Nha Sĩ</h1>
                    <p class="mb-4"><a target="_blank"
                            href="https://datatables.net">VietHan Dental</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Nha Sĩ</h6>
                            <!-- <a <?php //echo $xem; ?> class="m-0 font-weight-bold text-primary" style="float: right;" href="ns.php?yeucau_ns=1">Thêm Nha Sĩ<a> -->
                            <a <?php echo $xem; ?> class="m-0 font-weight-bold text-primary" style="float: right;" href="add_epx.php?id_nha_si=<?php echo $id_nha_si?>">Thêm Chuyên Môn<a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>                                            
                                            <th>ten_dich_vu</th>
                                            <th>kinh_nghiem</th>
                                            <!-- <th <?php //echo $xem; ?> >tay_nghe</th> -->
                                            <th style='text-align:center' <?php echo $xem; ?> >Cập Nhật</th>
                                            <th  style='text-align:center' <?php echo $xem; ?> >Xóa</th>
                                            
                                        </tr>
                                    </thead>                                   
                                    <tbody id="data">
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                    <h5 class="modal-title" id="exampleModalLabel">Bạn Có Chắc Chắn Muốn Đăng Xuất Chứ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Click "Logout" Để Hoàn Thành Đăng Xuất.</div>
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
    <script type="text/javascript">
        const url ="./API/show_list_epx_nha_si_theo_id.php?id_nha_si="+<?php echo $id_nha_si; ?>+"";
    fetch(url).then(
      res=>{
        res.json().then(
          data=>{
            console.log(data);
            if(data.length > 0) {

              var temp = "";
              data.forEach((u)=> {
                
                temp +="<tr>";               
                temp +=   "<td>"+ u.ten_dich_vu +"</td>";            
                temp += "<td>"+ u.kinh_nghiem +"</td>";
               // temp += "<td>"+ u. +"</td>";                        
                
                temp +=  "<td <?php echo $xem; ?> style='text-align:center'>"+"<p><a href='edit_taynghe.php?id_nha_si="+u.id_nha_si+"&ten_nha_si="+u.ho_ten_nha_si+"&id_dich_vu="+u.id_dich_vu+"&ten_dich_vu="+u.ten_dich_vu+"'><button type='button' class='btn btn-outline-info'>X</button></a></p>"+"</td>";
                temp += "<td <?php echo $xem; ?> style='text-align:center'>"+"<p><a href='process/delete_taynghe.php?yeucau=1&id_nha_si="+u.id_nha_si+"&id_dich_vu="+u.id_dich_vu+"'><button type='button' class='btn btn-outline-danger'>X</button></a></p>"+"</td>";     

                })
            
            document.getElementById("data").innerHTML = temp;
            }
          }
          )
      }
      )
      </script>

</body>

</html>