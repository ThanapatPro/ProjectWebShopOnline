<?php
include '../../config/condb.php' ;
$type_name=$_POST['type_name'];

    $sql="INSERT INTO type_p(type_name)
    VALUES('$type_name')";
    
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
        echo "<script> window.location='../show_product.php'; </script>";
    }else{
        echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script>";
    }

?>