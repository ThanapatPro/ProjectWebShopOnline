
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5 " >
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <div class="col-sm-3 px-2 ">
                <form method="POST" action="index.php" >
                <select class="form-select border-dark" name="key_type" aria-label="Default select example">
                    <?php 
                        $sql = "SELECT * FROM type_p ORDER BY type_name ";
                        $hand = mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($hand)){
                    ?>
                        <option value="<?=$row['type_id']?>"><?=$row['type_name']?></option>
                    <?php
                        }
                    ?>

                </select>
                </div>

                <div class="col-sm-5 px-2">
                    <button type="submit" name="btt1" class="btn btn-success">ค้นหา</button>
                    <button type="submit" name="btt2" class="btn btn-success">สินค้าทั้งหมด</button>
                </div>
                </form>    

                <div class="col-sm-3">     
                    <form class="d-flex pb-1" method="get" action="index.php" > 
                        <input class="form-control me-2 border-dark" type="search" name ="search" placeholder="Search" aria-label="Search" value="<?=(isset($_GET['search']) ? $_GET['search'] : '')?>" />
                        <button class="btn btn-outline-success " type="submit">Search</button>
                    </form>
                </div>            
                </div>
            </div>
</nav>
