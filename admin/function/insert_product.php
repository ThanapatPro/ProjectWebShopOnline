<?php
include '../../config/condb.php' ;
$p_name=$_POST['pname'];
$d_name=$_POST['dname'];
$typeid=$_POST['typeid'];
$price=$_POST['price'];
$num=$_POST['num'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'product_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../../image/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

    $sql="INSERT INTO product(pro_name,pro_detail,type_id,pro_price,pro_amount,pro_image)
    VALUES('$p_name','$d_name','$typeid','$price','$num','$new_image_name')";
    
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
        echo "<script> window.location='../show_product.php'; </script>";
    }else{
        echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script>";
    }

?>