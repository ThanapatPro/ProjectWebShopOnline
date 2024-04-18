<?php include ('../config/condb.php'); 
$ids=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Report Order</title>
        <?php include ('link.php');?>
    </head>
    <body class="sb-nav-fixed">
        
        <?php include ('a_menu.php');?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">เลขที่การสั่งซื้อ : <?=$ids?></h2>             

                                <table class="table table-striped">
                                    <thead >
                                        <tr class="text-center">
                                            <th>รหัสสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>ราคา</th>
                                            <th>จำนวน</th>
                                            <th>ราคารวม</th>
                                        </tr>
                                    </thead>
 
                                <?php 

                                    $sql = "SELECT * FROM tb_order t, order_detail d, product p 
                                    WHERE t.orderID=d.orderID and d.pro_id=p.pro_id and d.orderID='$ids'
                                    ORDER BY d.pro_id";
                                    $result=mysqli_query($conn,$sql);
                                    $sum_total=0;
                                    while ($row=mysqli_fetch_array($result)) {
                                        $sum_total=$row['total_price'];
                                ?>

                                    
                                        <tr>
                                            <td><?=$row['pro_id']?></td>
                                            <td><?=$row['pro_name']?></td>
                                            <td><?=$row['orderPrice']?></td>
                                            <td><?=$row['orderQty']?></td>
                                            <td><?=$row['Total']?></td>  
                                        </tr>
                                <?php
                                    }
                                    mysqli_close($conn);
                                ?>   
                                </table>
                                <h4>ราคารวมสุทธิ <?=number_format($sum_total,2)?> บาท </h4>
                            </div>
                            <div>
                                <a href="a_index.php"><button class="btn btn-outline-success m-4">กลับหน้าหลัก</button></a>
                            </div>
                        </div>

                        

                    </div>

                    
                </main>

                <?php include('a_footer.php'); ?>

            </div>
        </div>
        
    </body>
</html>
