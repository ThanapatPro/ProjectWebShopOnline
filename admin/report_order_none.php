<?php include ('../config/condb.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ยังไม่ได้ชำระเงิน</title>
        <?php include ('link.php');?>
    </head>
    <body class="sb-nav-fixed">
        
    <?php include ('a_menu.php');?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">รายงานการสั่งซื้อ</h1>

                        <div class="card mb-4">

                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                แสดงข้มูลการสั่งซื้อสินค้า
                            </div>



                            <div class="card-body">
                                <div class="mt-2 mb-3">  
                                <?php include ('button/button_order.php'); ?>
                                </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>เลขที่ใบเสร็จสั่งซื้อ</th>
                                            <th>ชื่อลูกค้า</th>
                                            <th>ที่อยู่จัดส่ง</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>ราคารวมสุทธิ</th>
                                            <th>วันที่สั่งซื้อ</th>
                                            <th>สถานะการสั่งซื้อ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>oederID</th>
                                            <th>cus_name</th>
                                            <th>address</th>
                                            <th>phone</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                <?php 

                                    $sql = "SELECT * FROM tb_order WHERE order_status='1' ORDER BY reg_date DESC";
                                    $result=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_array($result)) {
                                    $status = $row['order_status'];
                                ?>

                                    
                                        <tr>
                                            <td><?=$row['orderID']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=$row['address']?></td>
                                            <td><?=$row['phone']?></td>
                                            <td><?=$row['total_price']?></td>
                                            <td class="w-100"><?=$row['reg_date']?></td>
                                            <td>
                                                <?php 
                                                    if($status == 1){
                                                        echo "<b style='color:blue'> ยังไม่ชำระเงิน </b>";
                                                    }elseif($status == 2){
                                                        echo "<b style='color:green'> ชำระเงินแล้ว </b>";
                                                    }elseif($status == 0){
                                                        echo "<b style='color:red'> ยกเลิกการสั่งซื้อ </b>";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                    mysqli_close($conn);
                                ?>   
                                          
                                </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </main>

                <?php include('a_footer.php'); ?>

            </div>
        </div>
        
    </body>
</html>

        <script>
            function del(mypage){
                var agree=confirm('คุณต้องการยกเลิกใบสั่งซื้อหรือไม่');
                if(agree){
                    window.location=mypage;
                }
            }
        </script>