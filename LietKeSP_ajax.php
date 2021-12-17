<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <title>Document</title>
  </head>
  <style>
        .item {
          width: 220px;
          height: 300px;
          text-align: center;
          font-size: 14px;
          white-space: nowrap;

        }
        .item .img img {
          width: 200px;
          height: 200px;
        }
        #lietke{
          width: 2  00px;
          height: 30px;
        }
        .inputSL{
            display: flex;
            height: 20px;
            gap: 5px;
        }
        .inputSL input{
            width: 30%;
        }
        .inputSL button{
            width: 35%;
        }
        #result_LietKe{
            margin-top: 100px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .cart{
          display: flex;
          align-items: center;
          gap: 10px;
          text-decoration: none;
        }
        .header{
          display: flex;
          justify-content: space-between;
          padding: 20px 50px;
        } 
  </style>
  <body>
    <div class="header">
      
    <div>
      <select id="lietke">
        <?php 
          include "connect.php";
          $sql = "SELECT DISTINCT LOAISP FROM sanpham";
          $result = $connect -> query($sql);
          if ($result->num_rows > 0) 
          {
              echo "<option>Chọn sản phẩm</option>";
              echo "<option value='all'>Chọn tất cả sản phẩm</option>";
              while($row = $result->fetch_row()) 
              {
                  echo "<option value='$row[0]'>".$row[0]."</option>";
              }
        }
        ?>
      </select>
    </div>
    <a href="giohang.html" class="cart"><i class="fad fa-cart-plus block"></i>Giỏ hàng <p id="numCart">0</p></a>
    </div>
    
    <div id="result_LietKe">
    </div>
    <script>
      $('#lietke').change(function () {
        const type = $(this).val();
        if (type) {
          $.get('LietKeSP.php?type=' + type, function (data) {
            $('#result_LietKe').html(data);
          });
        }
      });
      $('#result_LietKe').on('click', '.btnBuy', function () {
        const num = $(this).parent().children('input').val() * 1;
        const id = $(this).parent().parent().attr('data-id');
        const name = $(this).parent().parent().children('.name').text();
        const price = $(this).parent().parent().children('.price').text();
        const url = $(this).parent().parent().children('.img').children('.url').attr('src');
        console.log(url);
        if (num >= 1) {
          const data = {
            id,
            name,
            num,
            price,
            url
          };
          $.post('themgiohang.php',data ,function(data){

            $('#numCart').html(data);
          })
        }
      });
      $('#totalPrice').html(function(){
        let TotalPrice=0;
      $('.total').each(function(){
        TotalPrice += $(this).text()*1;
        })
        return 1000;
      })
    </script>
  </body>
</html>
