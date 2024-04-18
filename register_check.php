<?php
    include 'config/condb.php';
    session_start();

if (isset($_POST['re_submit'])) {
    if ($_POST['re_password'] != $_POST['re_cp']) {
        $_SESSION['err_password'] = "Password ไม่ตรงกัน";
        header('location: register.php');
    }else{

    $re_fn = $_POST['re_fname'];
    $re_ln = $_POST['re_lname'];
    $re_em = $_POST['re_email'];
    $username = $_POST['re_username'];
    $password = $_POST['re_password'];
    $c_password = $_POST['re_cp'];



    $sql="INSERT INTO member(mb_fname,mb_lname,mb_email,username,password,mb_status)
    VALUES('$re_fn','$re_ln','$re_em','$username','$password','0') ";
    $result = mysqli_query($conn,$sql);
    if($result) {
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script> ";
        echo "<script> window.location='login.php'; </script> ";
    }else {
        echo "ERROR". $sql . "<br>" . mysqli_error($conn);
        echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script> ";
    }
    mysqli_close($conn);

}

}

?>