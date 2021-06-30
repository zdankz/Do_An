<?php
$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");
$q = $_GET['q'];
$query= "SELECT * from dich_vu join nhom_dich_vu on dich_vu.id_nhom_dich_vu = nhom_dich_vu.id_nhom_dich_vu where nhom_dich_vu.id_nhom_dich_vu = '$q' ";
$data = mysqli_query($connect,$query);
echo "<option value=''>Tất Cả</option>";
while($row = mysqli_fetch_array($data)){
	echo "<option value='".$row['id_dich_vu']."'>".$row['ten_dich_vu']."</option>";
}
?>