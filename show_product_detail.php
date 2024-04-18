<?php include ('config/condb.php');
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
    <title>Shop</title>
    
</head>
<body>
    <!-- Navigation-->
    <?php include ('menu.php') ?>
    <!-- Header-->
    <?php include ('header.php') ?>
    <!-- Section-->                     
    <?php include ('lmenu.php') ?>

<div class="container ">
  <div class="row">
    <?php 
    $ids=$_GET['id'];
    $sql ="SELECT * FROM product,Type_p WHERE product.type_id = type_p.type_id and product.pro_id='$ids' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    ?>

    <div class="col-md-4 mt-4 ">
        <img src="image/<?=$row['pro_image']?>"width="330px" height="400px" />
    </div>

    <div class="col-md-4 mt-5 ">
    <h1><?=$row['pro_name']?></h1>
    <h3>ราคา: <b class="text-danger"> <?=number_format($row['pro_price'],2)?> </b> บาท <br></h3>
     
    <table class="table">
  <thead>
    <tr>
      <th><h4>รายละเอียดสินค้า:</h4></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?=$row['pro_detail']?></th>

    </tr>
  </tbody>
</table>
        
    <a class="btn btn-outline-success mt-4" style="width: 300px;" href="order_add.php?id=<?=$row['pro_id']?>" > ใส่ตระกร้า </a>
    </div>


  </div>
</div>
<?php
mysqli_close($conn);
?> 

<?php include ('footer.php') ?>

</body>
</html>


