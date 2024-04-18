<?php include ('../config/condb.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>สินค้า</title>
        <?php include ('link.php');?>
    </head>
    <body class="sb-nav-fixed">
        
    <?php include ('a_menu.php');?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">สต็อกสินค้า</h1>



                        <div class="card mb-4">
                            <div class="card-header">
                                
                                <i class="fas fa-table me-1"></i>
                                แสดงข้อมูลสินค้า
                            </div>

                            <div class="card-body">

                            <div class="col-12">
                                <a href="add_product.php" class="text-center btn btn-outline-success w-100">
                                เพิ่มสินค้า 
                                </a>
                            </div><br>

                                <table id="datatablesSimple" class="text-center">
                                    <thead>
                                        <tr>
                                            <th>รหัสสินค้า</th>
                                            <th>รูปสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>รายละเอียดสินค้า</th>
                                            <th>ประเภทสินค้า</th>
                                            <th>จำนวนคงเหลือ</th>
                                            <th>ราคาสินค้า</th>
                                            <th>แก้ไขสินค้า</th>
                                            <th>ลบสินค้า</th>

                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>pro_id</th>
                                            <th>pro_name</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                <?php 

                                    $sql="SELECT * FROM product,type_p WHERE product.type_id = type_p.type_id ORDER BY pro_id DESC";
                                    $result=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_array($result)) {
                                ?>

                                        <tr>
                                            <td><?=$row['pro_id']?></td>
                                            <td>
                                            <img src="../image/<?=$row['pro_image']?>" 
                                            style="width: 150px; height: 100px;">
                                            </td>
                                            <td><?=$row['pro_name']?></td>
                                            <td><?=$row['pro_detail']?></td>
                                            <td><?=$row['type_name']?></td>
                                            <td><?=$row['pro_amount']?></td>
                                            <td>฿ <?=number_format($row['pro_price'],2)?></td>      
                                            <td><a href="edit_product.php?id=<?=$row['pro_id']?>" 
                                                class="btn btn-warning w-100" 
                                                onclick="com(this.href); return false;"> แก้ไข </a></td> 
                                            <td><a href="function/delete_product.php?id=<?=$row['pro_id']?>" 
                                                class="btn btn-danger w-100" 
                                                onclick="del(this.href); return false;"> ลบ </a></td>                                  
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
                    <?php include('show_type.php'); ?>
                </main>
                <?php include('a_footer.php'); ?>
            </div>
        </div>


        
    </body>
</html>

        <script>

            function del(mypage){
                var agree=confirm('คุณต้องการลบหรือไม่');
                if(agree){
                    window.location=mypage;
                }
            }

            function com(mypage){
                var agree=confirm('คุณต้องการแก้ไขสินค้าหรือไม่');
                if(agree){
                    window.location=mypage;
                }
            }



        </script>