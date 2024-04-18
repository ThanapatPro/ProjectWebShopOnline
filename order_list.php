<?php include 'config/condb.php';
session_start(); 
$sql="SELECT * FROM tb_order WHERE orderID= '" . $_SESSION["order_id"] . "' ";
$resul = mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($resul);
$total_price=$rs['total_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/print.css" rel="stylesheet" media="print">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <title>รายการสั่งซื้อ</title>
</head>
<body>
    
    <!-- Navigation-->
    <div id="none"><?php include ('menu.php') ?></div>
    <!-- Header-->
    <div id="none"><?php include ('header.php') ?></div>

    <div class="container pt-4">

        <div class="row border border-dark">
            <div class='col-12 p-4 h4 text-center '>
                การสั่งซื้อเสร็จสมบูรณ์
            </div>

            <div class='col-12 h5 m-4'>
                เลขที่การสั่งซื้อ: <?=$rs['orderID']?> <br>
                ชื่อ-สกุล:  <?=$rs['cus_name']?> <br>
                ที่อยู่จัดส่ง:  <?=$rs['address']?> <br>
                เบอร์โทรศัพท์:  <?=$rs['phone']?> <br>
            </div>

            <div class='col-12 h5 mt-2'>
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th class="p-3">รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวนที่สั่ง</th>
                        <th>ราคารวม</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $sql1="SELECT * FROM order_detail d,product p WHERE d.pro_id=p.pro_id and d.orderID= '" . $_SESSION["order_id"] . "' ";
                    $resul1 = mysqli_query($conn,$sql1);
                    while($row=mysqli_fetch_array($resul1)){
                ?>
                    <tr>
                        <td class="p-3"><?=$row['pro_id']?></td>
                        <td><?=$row['pro_name']?></td>
                        <td><?=$row['orderPrice']?></td>
                        <td><?=$row['orderQty']?></td>
                        <td><?=$row['Total']?></td>
      
                    </tr>
                </tbody>
                <?php
                    }
                ?>    
            </table>
            </div>
            <div class="text-end">
                <h5 class="m-2"> รวมเป็นเงิน <?=number_format($total_price,2)?> บาท </h6>
            </div>   

            <div>
                <h4 class="text-center text-danger m-5"> *** กรุณาโอนเงินภายใน 7 วัน หลังจากทำการสั่งซื้อ*** </h4>
                <div class="p-5 text-center">
                    <button onclick="window.print()" class="btn btn-outline-dark" style="width: 20%;" id="print">ปริ้นใบเสร็จ</button>
                    <a href="index.php"><button class="btn btn-outline-danger" id="none" style="width: 20%;">เสร็จสิ้น</button></a>
                </div>
                
            </div>

        </div>
        
    </div>

    <div id="none"><?php include ('footer.php') ?></div>
</body>
</html>
