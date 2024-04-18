<?php 
include ('../config/condb.php'); 
$idpro = $_GET['id'];
$sql1 = "SELECT * FROM product WHERE pro_id='$idpro' ";
$result= mysqli_query($conn,$sql1);
$rs=mysqli_fetch_array($result);
$p_typeID = $rs['type_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('link.php');?>
    <title>Add product</title>
</head>
<body>

    <div class= "container">
        <div class="row">
            <div class="col-sm-6">

                <div class="alert alert-success h4 text-center mb-4 mt-4"> แก้ไขสินค้า </div>

                <form name="form1" method="post" action="function/update_product.php" enctype="multipart/form-data">
                    <label>รหัสสินค้า : </label><br>
                        <input type="text" name="proid" class="form=content" readonly value=<?=$rs['pro_id']?> > <br><br>
                    <label>ชื่อสินค้า : </label><br>
                        <input type="text" name="pname" class="form=content" required value=<?=$rs['pro_name']?> > <br><br>
                    <label>รายละเอียดสินค้า : </label><br>
                        <input type="text" name="dname" class="form=content" required value=<?=$rs['pro_detail']?> > <br><br>

                    <label>ประเภทสินค้า : </label><br>
                        <select class="form-select" name="typeID" > 
                            <?php
                                $sql="SELECT * FROM type_p";
                                $hand=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_array($hand)){
                                    $ttypeID = $row['type_id'];
                            ?>
                                <option value="<?=$row['type_id']?>" <?php if($p_typeID==$ttypeID){echo "selected=selected";} ?> > 
                                <?=$row['type_name']?> </option>
                            <?php
                                }
                                mysqli_close($conn);
                            ?>
                        </select><br>

                        <label>ราคาสินค้า : </label><br>
                            <input type="number" name="price" class="form=content" required value=<?=$rs['pro_price']?> > <br><br>
                        <label>จำนวน : </label><br>
                            <input type="number" name="num" class="form=content" required value=<?=$rs['pro_amount']?> > <br><br>
                        <label>รูปภาพสินค้า : </label><br>
                            <img src="../image/<?=$rs['pro_image']?>" width="80px" height="80px"><br><br>
                            <input type="file" name="file1" > <br><br>
                            <input type="hidden" name="txtimg" class="form=content" value=<?=$rs['pro_image']?> >

                            <button type="submit" class="btn btn-success"> อัพเดท </button>
                            <a class="btn btn-danger align-self-end ml-auto" href="show_product.php" role="button"> ยกเลิก </a> 
                           
                </form>

            </div>
        </div>
    </div>

</body>
</html>