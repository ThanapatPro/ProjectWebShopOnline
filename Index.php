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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    
    <title>Index</title>
</head>
<body>
  
    <!-- Navigation-->
    <?php include ('menu.php') ?>
    <!-- Header-->
    <?php include ('header.php') ?>
    <!-- Section-->                     
    <?php include ('lmenu.php') ?>

<div class="container mt-5  ">

  <div class="row">
    <div class="col-sm-12 text-center border ">
        <h1 class="m-2 p-2">สินค้าใหม่</h1>
    </div>
  </div>

  <div class="row border ">
        <?php include ('product.php') ?>
  </div>

</div>

<?php include ('footer.php') ?>
</body>
</html>