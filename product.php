

<?php 
        include ('config/condb.php');
        //คำสั่งแบ่งหน้าเพจ
        $perpage = 8;
        if (isset($_GET['page'])){
            $page = $_GET['page'];

        }else{
            $page = 1;
        }
        $start = ($page -1) * $perpage;

        $keyType = @$_POST['key_type'];
        $key_word = @$_GET['search'];

        if($key_word !=""){
            $sql_pro = "SELECT * FROM product WHERE pro_id='$key_word' or pro_name like '%$key_word%' or pro_price <= '$key_word' ORDER BY pro_id DESC limit {$start}, {$perpage} " ;
        }elseif(isset($_POST['btt1'])){
            $sql_pro = "SELECT * FROM product p,type_p t WHERE p.type_id=t.type_id and p.type_id='$keyType'  ORDER BY pro_id DESC limit {$start}, {$perpage} ";
        }elseif(isset($_POST['btt2'])){
            $sql_pro = "SELECT * FROM product p,type_p t WHERE p.type_id=t.type_id ORDER BY pro_id DESC limit {$start}, {$perpage} ";
        }else{
            $sql_pro = "SELECT * FROM product p,type_p t WHERE p.type_id=t.type_id ORDER BY pro_id DESC limit {$start}, {$perpage} ";
        }


/*         if($key_word !=""){
            $sql_pro = "SELECT * FROM product WHERE pro_id='$key_word' or pro_name like '%$key_word%' or pro_price <= '$key_word' ORDER BY pro_id limit {$start}, {$perpage}";
        }else{
            $sql_pro = "SELECT * FROM product ORDER BY pro_id limit {$start}, {$perpage}";
        }

        
        if(isset($_POST['btt1'])){
          $sql_pro = "SELECT * FROM product p,type_p t WHERE p.type_id=t.type_id and p.type_id='$keyType'  ORDER BY pro_id ";
        }elseif(isset($_POST['btt2'])){
          $sql_pro = "SELECT * FROM product p,type_p t WHERE p.type_id=t.type_id ORDER BY pro_id ";
        }else{
          $sql_pro = "SELECT * FROM product p,type_p t WHERE p.type_id=t.type_id ORDER BY pro_id ";
        }       
 */

$result_pro= mysqli_query($conn,$sql_pro);
while($row=mysqli_fetch_array($result_pro)){
?>

<div class="col-sm-3 mt-4 m">
    <div class="card border-dark ">
                <!-- Product image-->
                <a href="show_product_detail.php?id=<?=$row['pro_id']?>"><img class="card-img-top" src="image/<?=$row['pro_image']?>" width="450px" height="300px"></a>
                <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?=$row['pro_name']?></h5>
                            <!-- Product price-->
                            <h5 class="fw-bolder text-primary">฿ <?=number_format($row['pro_price'],2)?></h5>
                        </div>
                    </div>
                    <!-- Product actions-->
                <div class="p-4 pt-0 ">
                    <div class="text-center">
                    <a class="btn btn-outline-dark mt-auto bi bi-basket2" href="order_add.php?id=<?=$row['pro_id']?>"></a>
                        <a class="btn btn-outline-dark mt-auto" href="show_product_detail.php?id=<?=$row['pro_id']?>">รายละเอียดสินค้า</a>
                    </div>
                </div>
                    
    </div>
</div>
<?php
    }
    mysqli_close($conn);
?>


<?php 
include ('config/condb.php');
$sql1 ="SELECT * FROM product"; 
$query1= mysqli_query($conn,$sql1);
$total_record = mysqli_num_rows($query1);
$total_page = ceil($total_record / $perpage);
?>
<!-- /* คำสั่งหน้าถัดไป-ย้อนกลับ */ -->

<nav aria-label="Page navigation example"> 
  <ul class="pagination justify-content-center mt-4">
    <li class="page-item "><a class="page-link text-dark border-dark" href="index.php?page=1">Previous</a></li>
    <?php for($i=1;$i<=$total_page; $i++) {?>
    <li class="page-item"><a class="page-link text-dark border-dark" href="index.php?page=<?=$i?>"><?=$i?></a></li>
    <?php } ?>
    <li class="page-item"><a class="page-link text-dark border-dark" href="index.php?page=<?=$total_page?>">Next</a></li>
  </ul>
</nav>

<?php mysqli_close($conn); ?>