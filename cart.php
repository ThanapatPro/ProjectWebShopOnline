<?php 
include ('config/condb.php') ;
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    
    <title>cart</title>
    
</head>
<body>
    <!-- Navigation-->
    <?php include ('menu.php') ?>
    <!-- Header-->
    <?php include ('header.php') ?>

<form id="from1" method="POST" action="insert_cart.php">
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">
              <div class="col-lg-8">
                <h5 class="mb-3">ตะกร้าสินค้า</h5>
                <hr>


<!-- ส่วนตะกล้า -->

    <?php //คิดเงินจำนวน//
        $Total = 0;
        $sumPrice = 0;
        $m = 1;
        //ถ้าไม่เป็นค่าว่าง
        if(isset($_SESSION["intLine"])){        

        for ($i=0; $i <= (int) $_SESSION["intLine"]; $i++){

        if(($_SESSION["strProductID"][$i]) != ""){
            $sql1="SELECT * FROM product WHERE pro_id ='" . $_SESSION["strProductID"][$i] . "' " ;
            $result1 = mysqli_query($conn, $sql1);
            $row_pro = mysqli_fetch_array($result1);
            //คิดเงินรวม//
            $_SESSION["price"] = $row_pro['pro_price'];
            $Total = $_SESSION["strQty"][$i];
            $sum = $Total * $row_pro['pro_price'];
            $sumPrice = $sumPrice + $sum;
            $_SESSION["sum_price"] = $sumPrice;
    ?> 

                <div class="card mb-3">
      
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                       <div class="d-flex flex-row align-items-center">
                        
                        <div>
                          <img src="image/<?=$row_pro['pro_image']?>"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 100px; height: 100px;">
                        </div>

                        <div class="ms-3">
                          <h5><?=$row_pro['pro_name'];?></h5>
                          <h5 style="color: blue ;">฿ <?=number_format($row_pro['pro_price'],2)?></h5>
                        </div>
                       </div>

                      <div class="d-flex flex-row align-items-center">

                        <div style="width: 60px;">
                            <a href="order_add.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-dark" >+</a> 
                            <?php if($_SESSION["strQty"][$i] > 0){ ?>
                        </div>

                        <div style="width: 30px;">
                          <h5 class="fw-normal mb-0"><?=$_SESSION["strQty"][$i]?></h5>
                        </div>

                        <div style="width: 60px;">
                            <a href="order_del.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-dark">-</a>
                            <?php } ?>
                        </div>

                        <div style="width: 130px;">
                          <h5 class="mb-0">฿ <?=number_format($sum,2)?></h5>
                        </div>

                        <div style="width: 40px;">
                        <a href="cart_pro_del.php?Line=<?=$i?>">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-outline-danger bi bi-trash3"></button>
                            </h5>
                        </a>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

                <?php
                    $m=$m+1;
                        }
                        }
                        } 
                        mysqli_close($conn);
                ?>

                <a href="index.php"><button type="button"  
                class="btn btn-outline-primary float-end"  
                type="submit">เลือกสินค้าต่อ</button></a>

<!-- ส่วนตะกล้า -->

              </div>
              <div class="col-lg-4">

                <div class="card text-white rounded-3" style="background: #5F9EA0;">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h2 class="mt-2 mb-0 py-0">ข้อมูลการจัดส่งสินค้า</h2>
                    </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" name="cus_name" class="form-control form-control-lg" 
                        siez="17" required/>
                        <label class="form-label p-1" for="typeName">ชื่อ-สกุล: </label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <textarea type="text" class="form-control" name="cus_add" rows="3" 
                        siez="17" style="height: 100px;" required></textarea>
                        <label class="form-label p-1" for="typeText">ที่อยู่จัดส่งสินค้า: </label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="number" name="cus_tel" class="form-control form-control-lg" 
                        siez="17" required/>
                        <label class="form-label p-1" for="typeText">เบอร์โทรศัพท์: </label>
                      </div>

                    <hr class="my-4" >

                    <div class="d-flex justify-content-between mb-4">
                      <h3 class="mb-2">Total</h3>
                      <h3 class="mb-2"><?=number_format($sumPrice,2)?></h3>
                    </div>

                      <div class="col-12 d-flex justify-content-between" >
                            <button style="background-color: #eee; width: 100%;"  
                            class="btn btn-outline-dark text-dark" type="submit">ชำระเงิน</button>
                      </div>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

<?php include ('footer.php') ?>

</body>
</html>