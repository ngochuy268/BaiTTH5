<?php 
    include "connect.php";
    if(isset($_POST["name"]) && isset($_POST["pass"])) {
        $name = $_POST["name"];
        $pass = $_POST["pass"];
        $sql = "SELECT * FROM login WHERE username = '$name' AND password = '$pass'";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) 
        {
        echo "Chúc mừng bạn đã đăng nhập thành công!!!";
        }
        else 
        {
            echo "Đăng nhập không thành công. Vui lòng đăng nhập lại!!!";
        }
        $connect->close();
    }
?>