
<?php
    include "connect.php";
    $masp=$_POST['masp'];
    $tensp=$_POST['tensp'];
    $nuocsx=$_POST['nuocsx'];
    $donvi=$_POST['dvt'];
    $gia=$_POST['giasp'];
    $loaisp=$_POST['loaisp'];
    $hinhanh=$_POST['hinhsp'];
    $sql="INSERT INTO sanpham VALUES (?,?,?,?,?,?,?)";
    $result = $connect->prepare($sql);
    $result->bind_param("ssssiss",$masp, $tensp, $donvi, $nuocsx, $gia, $hinhanh,$loaisp);
    $stmt=$result->execute();
    if($stmt)
        echo "Thêm thành công";
    else
        echo "Thêm không thành công";
?>