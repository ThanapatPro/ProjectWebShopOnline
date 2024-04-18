<?php 
include 'config/condb.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['error']="";

$sql="SELECT * FROM member WHERE username='$username' and password='$password' ";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$_SESSION["role"] = $row['mb_status'];

if($row > 0){
    $_SESSION["un"]=$row['username'];
    $_SESSION["pw"]=$row['password'];
    $_SESSION["fn"]=$row['mb_fname'];
    $_SESSION["ln"]=$row['mb_lname'];
    $_SESSION["mbid"]=$row['mb_id'];
    $_SESSION['error']="";
    echo "<script> window.location='index.php'; </script>";
    $_SESSION['error']="";

        if($_SESSION["role"] == '0'){
            header("location:index.php");
        }elseif($_SESSION["role"] == '1'){
            header("location:admin/a_index.php");
        }

}else {
    $_SESSION["error"] = "your username or password is invalid";
    header("location:login.php");
}

 ?>
