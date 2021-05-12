<?php 
session_start();
require "API/get_count_don.php";
require "API/API_FILTER_DV/data.php";
if(!isset($_SESSION['role'])){
header("Location: login.php");
}
if($_SESSION['role'] ==1 ){
    $role = "Admin";
    $xem = "";

}else {
    header("Location: login.php");
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

    <title><?php echo $role; ?> Manager</title>

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
                <div class="sidebar-brand-text mx-3">SB <?php echo $role; ?> <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Danh mục quản lý
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
                        <h6 class="collapse-header">Chính sách quản lý</h6>
                        <a class="collapse-item" href="forgot-password.php">Thay đổi password</a>
                        <!-- <a class="collapse-item" href="utilities-border.html"> Nhóm Dịch Vụ</a>
                        <a class="collapse-item" href="utilities-animation.html">Thêm</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->
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
                                <a class="dropdown-item" href="process/process_logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                                  

                    <div class="row">

                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-3">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bộ Lọc Danh Sách Đơn Đặt Lịch</h6>
                                </div>
                                <div class="card-body">
                                    <form method="GET" action="thongke.php">
                                       <!--  <div class="form-group">
                                            <label for="exampleFormControlInput1">id_don_dat_lich</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="id_don_dat_lich">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Lọc Theo Khách Hàng</label>
                                            <select class="form-control" name="id_khach_hang">
                                                    <option>Chọn Khách Hàng</option>
                                                   
                                                    <?php 
                                                        while($row = mysqli_fetch_array($data_khach_hang)) 
                                                        {                                                            
                                                            echo "<option value ='".$row['id_khach_hang']."'>".$row['ho_ten_khach_hang'] ."</option>";
                                                        } 

                                                    ?>                                                                     
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="cars">Lọc Theo Nha Sĩ</label>
                                            <select class="form-control" name="id_nha_si" >
                                                    <option>Chọn Nha Sĩ</option>
                                                   
                                                    <?php 
                                                        while($row = mysqli_fetch_array($data_nha_si)) 
                                                        {
                                                            
                                                            echo "<option value ='".$row['Id_nha_si']."'>".$row['ho_ten_nha_si'] ."</option>";
                                                            
                                                        } 

                                                    ?>                                                                     
                                            </select>
                                        </div>
                                        <!-- <div class="form-group" hidden="">
                                             <label for="cars">Chọn Nhóm Dịch Vụ</label>
                                            <select  class="form-control" name="id_nhom_dich_vu" onchange="showUser(this.value)" id="data_nhom_dich_vu">
                                               
                                            </select>
                                        </div> -->
                                        <div class="form-group" >
                                            <label for="cars">Lọc Theo Nhóm Dịch Vụ</label>
                                            <select class="form-control" name="id_nhom_dich_vu" >
                                                    <option>Chọn Nhóm Dịch Vụ</option>                                                  
                                                    <?php 
                                                        while($row = mysqli_fetch_array($data_nhom_dich_vu)) 
                                                        {
                                                            
                                                            echo "<option value ='".$row['id_nhom_dich_vu']."'>".$row['ten_nhom_dich_vu'] ."</option>";
                                                            
                                                        } 

                                                    ?>                                                                     
                                            </select>
                                        </div>
                                        <!-- <div class="form-group" hidden="">
                                             <label for="cars">Chọn Dịch Vụ</label>
                                            <select class="form-control" name="id_dich_vu"  id="data_dich_vu">
                                               <option value="">Tất Cả</option>
                                           
                                            </select>
                                        </div>-->
                                        <div class="form-group" >
                                            <label for="cars">Thời gian đăng ký khám</label>
                                            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="" name="time_create">
                                        </div>
                                        <div class="form-group" >
                                            <label for="cars">Đơn Từ Ngày</label>
                                            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="" name="time_from">
                                        </div>
                                        <div class="form-group">
                                            <label for="cars">Đến Ngày</label>
                                            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="" name="time_to">
                                        </div>
                                        <div class="form-group" >
                                            <label for="cars">Trạng Thái</label>
                                            <select class="form-control" name="id_trang_thai"  >
                                                <option>Chọn Trạng Thái</option>
                                                 <option value="1">Đang chờ duyệt</option>
                                                 <option value="2">Đã duyệt</option>
                                             
                                        </select>
                                            
                                        </div> 
                                        <div class="form-group">                                            
                                            <input style="align-content: center;" type="submit" class="btn btn-primary" id="exampleFormControlInput1" placeholder="" value="submit" name="submit">
                                        </div>
                                        

                                        
                                    </form>
                                    

                                </div>
                            </div>

                           
                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kết Quả</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id_don_dat_lich</th>
                                            <th>thoi_gian_dang_ky</th>
                                            <th>ten_khach_hang</th>
                                            <th>ten_nha_si</th>
                                            <th>nhom_dich_vu</th>
                                            <th>trang_thai_don</th>
                                        </tr>
                                    </thead>                                   
                                    <tbody>
                                         <?PHP 
                                            require"process/process_filter.php";
                                            if(isset($_GET['submit'])){
                                                $data = check_submit();
                                            if(mysqli_num_rows($data) > 0){
                                                $num = mysqli_num_rows($data);
                                                echo "  <h6 class='m-0 font-weight-bold text-primary'>Có ".$num." kết quả cho lần lọc này</h6>";
                                                    while($row = mysqli_fetch_array($data)) 
                                                        {
                                                            
                                                            echo "<tr>";
                                                            echo "<td>" .$row['id_don_dat_lich']. "</td>";
                                                            echo "<td>" .$row['thoi_gian_dang_ky']. "</td>";
                                                            echo "<td>" .$row['ho_ten_khach_hang']. "</td>";
                                                            echo "<td>" .$row['ho_ten_nha_si']. "</td>";
                                                            echo "<td>" .$row['ten_nhom_dich_vu']. "</td>";
                                                            echo "<td>" .$row['ten_trang_thai']. "</td>";
                                                            echo "<tr>";
                                                        }
                                            } else {
                                                echo "  <h6 class='m-0 font-weight-bold text-primary'>Không có kết quả cho lần lọc này</h6>";
                                            }
                                        }
                                            
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                                  
                                        
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4" hidden="">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
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
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- <script type="text/javascript">
    const url ="./API/list_nhom_dich_vu.php";
    fetch(url).then(
      res=>{
        res.json().then(
          data=>{
            console.log(data);
            if(data.length > 0) {

              var temp = "";
              data.forEach((u)=> {               
                
                temp += "<option value='"+u.id_nhom_dich_vu+"'>"+u.ten_nhom_dich_vu+"</option>";
                })
            
            document.getElementById("data_nhom_dich_vu").innerHTML = temp;
            }
          }
          )
      }
      )
      </script>
      <script>
            function showUser(str) {
              if (str == "") {
                document.getElementById("data_dich_vu").innerHTML = "";
                return;
              } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("data_dich_vu").innerHTML = this.responseText;
                  }
                };
                xmlhttp.open("GET","./API/API_FILTER_DV/data_dv.php?q="+str,true);
                xmlhttp.send();
              }
            }
</script>
<script type="text/javascript">
    const url1 ="./API/list_dich_vu.php";
    fetch(url1).then(
      res=>{
        res.json().then(
          data=>{
            console.log(data);
            if(data.length > 0) {

              var temp1 = "";
              data.forEach((u)=> {               
                
                temp1 += "<option value='"+u.id_dich_vu+"'>"+u.ten_dich_vu+"</option>";
                })
            
            document.getElementById("data_dich_vu").innerHTML = temp1;
            }
          }
          )
      }
      )
      </script>
      <script type="text/javascript">
    const url2 ="./API/list_trang_thai.php";
    fetch(url2).then(
      res=>{
        res.json().then(
          data=>{
            console.log(data);
            if(data.length > 0) {

              var temp2 = "";
              data.forEach((u)=> {               
                
                temp2 += "<option value='"+u.id_trang_thai+"'>"+u.ten_trang_thai+"</option>";
                })
            
            document.getElementById("data_trang_thai").innerHTML = temp2;
            }
          }
          )
      }
      )
      </script>
      <script type="text/javascript">
    const url3 ="./API/list_nhasi.php";
    fetch(url3).then(
      res=>{
        res.json().then(
          data=>{
            console.log(data);
            if(data.length > 0) {

              var temp3 = "";
              //log(data);
              data.forEach((u)=> {               
                
                temp3 += "<option value='"+u.id_nha_si+"'>"+u.ho_ten_nha_si+"</option>";
                })
            
            document.getElementById("data_nha_si").innerHTML = temp3;
            }
          }
          )
      }
      )
      </script> -->

</body>

</html>