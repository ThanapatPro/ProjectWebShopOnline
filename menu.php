<?php
include ('config/condb.php') ; 
$sqlshop = "SELECT * FROM config_shop";
$result_shop= mysqli_query($conn,$sqlshop);
$row9=mysqli_fetch_array($result_shop);
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php"> <?=$row9['shopname']?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"></li>
                </ul>
                        <?php
                                if(isset($_SESSION["fn"])){
                                        ?>
                                        <a class="nav-link m-3" href="#">ยินดีต้อนรับ : <?=$_SESSION["fn"]?></a>
                                        <a class="nav-link m-3" href="logout.php">Logout</a>
                                <?php
                                }
                        ?>
                        
                        <?php
                                if(!isset($_SESSION["mbid"])){
                        ?>
                        <a class="nav-link m-3" href="login.php">Login</a>
                        
                        <?php
                                }
                        ?>

                        <a href="cart.php" class="btn btn-outline-dark" >Cart</a>
                </div>
            </div>
        </nav>

       