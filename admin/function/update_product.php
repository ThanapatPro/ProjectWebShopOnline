<?php
include '../../config/condb.php' ;
$proid=$_POST['proid'];
$p_name=$_POST['pname'];
$d_name=$_POST['dname'];
$typeid=$_POST['typeID'];
$price=$_POST['price'];
$num=$_POST['num'];
$image=$_POST['txtimg'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'product_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../../image/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$image";
    }

//คำสั่ง updata
    $sql="UPDATE product SET 
    pro_name = '$p_name',
    pro_detail = '$d_name',
    type_id = '$typeid',
    pro_price = '$price',
    pro_amount = '$num',
    pro_image = '$new_image_name'
    WHERE pro_id='$proid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='../show_product.php'; </script>";
}else{
    echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script>";
}
?>