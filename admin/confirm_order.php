<?php
include ('../config/condb.php');
$ids = $_GET['id'];

$sql="UPDATE tb_order SET order_status = 2 WHERE orderID='$ids' ";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>window.location='a_index.php'; </script>";
}else {
    echo "<script>alert('ไม่สามารถลบได้'); </script>";
}

mysqli_close($conn);
?>