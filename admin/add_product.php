<?php
include '../config/condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Add product</title>
</head>
<body>

    <div class= "container">
        <div class="row">
            <div class="col-sm-6">

                <div class="alert alert-success h4 text-center mb-4 mt-4"> เพิ่มสินค้า </div>

                <form name="form1" method="post" action="function/insert_product.php" enctype="multipart/form-data">
                    <label>ชื่อสินค้า : </label><br>
                        <input type="text" name="pname" class="form=content" required> <br><br>
                    <label>รายละเอียดสินค้า : </label><br>
                        <input type="text" name="dname" class="form=content" required> <br><br>
                    <label>ประเภทสินค้า : </label><br>
                        <select class="form-select" name="typeid" > 
                            <?php
                            $sql="SELECT * FROM type_p";
                            $hand=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($hand)){
                            ?>
                            <option value="<?=$row['type_id']?>"> <?=$row['type_name']?> </option>
                            <?php
                            }
                            mysqli_close($conn);
                            ?>
                        </select><br>

                        <label>ราคาสินค้า : </label><br>
                            <input type="number" name="price" class="form=content" required > <br><br>
                        <label>จำนวน : </label><br>
                            <input type="number" name="num" class="form=content" required > <br><br>
                        <label>รูปภาพสินค้า : </label><br>
                            <input type="file" name="file1" required > <br><br>

                            <button type="submit" class="btn btn-success"> ยืนยัน </button>
                            <a class="btn btn-danger align-self-end ml-auto" href="show_product.php" role="button"> ยกเลิก </a> 
                           
                </form>

            </div>
        </div>
    </div>

</body>
</html>