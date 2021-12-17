<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .good-add-wrapper{
            margin: 5% auto 0;
            width: fit-content;
        }
        input {
            width: 400px;
            height: 30px;
            border-radius: 7px;
            border: 1px solid #ccc
        }
        h3{
            margin-bottom: 4px;
        }
        /* button{
            width: 100px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
        } */
        .add-button{
            background-color: blue;
            color: #fff;
            width: 100px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .reset-button{
            background-color: rgb(19, 83, 19);
            color: #fff;
            width: 100px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="good-add-wrapper">
       <div class="good-add">
            <h1>Thêm sản phẩm</h1>
            <h3>Mã sản phẩm</h3>
            <input type="text" class="good-number" value = "" name="masp">
            <h3>Tên sản phẩm</h3>
            <input type="text" class="good-name" value = "" name="tensp">
            <h3>Nước sản xuất</h3>
            <input type="text" class="good-origin" value = "" name="nuocsx">
            <h3>Đơn vị tính</h3>
            <input type="text" class="good-unit" value = "" name="dvt">
            <h3>Giá</h3>
            <input type="text" class="good-pride" value = "" name="giasp">
            <h3>Loại sản phẩm</h3>
            <input type="text" class="good-type" value = "" name="loaisp">
            <h3>Hình ảnh</h3>
            <input type="text" class="good-img" value = "" name="hinhsp" style="margin-bottom: 10px;">
       </div>
       <div class="good-add-button">
           <input type="text" name="add-button" class="add-button" value="Thêm" readonly>
           <input type="text" name="reset-button" class="reset-button" value="Reset" readonly>
       </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $(".add-button").click(function(e){
            e.preventDefault();
            var masp = $('.good-number').val();
            var tensp = $('.good-name').val();
            var nuocsx = $('.good-origin').val();
            var dvt = $('.good-unit').val();
            var giasp = $('.good-pride').val();
            var loaisp = $('.good-type').val();
            var hinhsp = $('.good-img').val();
            if (masp && tensp && nuocsx && dvt && giasp && loaisp && hinhsp){
                const data = {
                    masp,
                    tensp,
                    nuocsx,
                    dvt,
                    giasp,
                    loaisp,
                    hinhsp,
                };
                $.post('themsanpham.php', data, function (data) {
                    alert(data);
                });
            } 
            else {
                alert("Chưa điền hết thông tin, vui lòng điền đầy đủ!");
            }
        });
    })
    
</script>
</html>