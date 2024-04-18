<?php
include '../../config/condb.php';
$idt=$_GET['idt'];
$sql="DELETE FROM type_p WHERE type_id ='$idt' ";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location='../show_product.php';</script>";
}else{
    echo "Error : ".$sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($conn);

?>