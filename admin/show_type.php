
                    <div class="container-fluid px-4" >
                        <h1 class="mt-4">ประเภทสินค้า</h1>



                        <div class="card mb-4">
                            <div class="card-header">
                                
                                <i class="fas fa-table me-1"></i>
                                แสดงข้อมูลประเภทสินค้า
                            </div>

                            <div class="col-12 text-center">
                                
                                <form name="form1" method="post" action="function/insert_type.php" enctype="multipart/form-data"><br>
                                <b class="text-center">ใส่ชื่อประเภทสินค้า : </b><br>
                                <input type="text" name="type_name" class="form=content w-50 mt-2" required> <br><br>
                                <button type="submit" class="btn btn-outline-success w-50" onclick="typeadd(this.href); return false;">เพิ่มประเภทสินค้า </button>
                            
                                
                                </form>
                            </div><br>

                                <table id="datatablesSimple" class="text-center table table-hover">
                                    <thead>
                                        <tr>
                                            <th>รหัสประเภทสินค้า</th>
                                            <th>ชื่อประเภทสินค้า</th>
                                            <th>ลบประเภทสินค้า</th>      
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    include ('../config/condb.php');
                                    $t_sql="SELECT * FROM type_p ";
                                    $t_result=mysqli_query($conn,$t_sql);
                                    while ($trow=mysqli_fetch_array($t_result)) {
                                ?>

                                        <tr>
                                            <td><?=$trow['type_id']?></td>
                                            <td><?=$trow['type_name']?></td> 

                                           

                                            <td><a href="function/delete_type.php?idt=<?=$trow['type_id']?>" 
                                                class="btn btn-danger w-20" 
                                                onclick="del(this.href); return false;"> ลบ </a></td>                                  
                                        </tr>
                                <?php
                                    }
                                    mysqli_close($conn);
                                ?>   
                                          
                                </tbody>
                                </table>
                            </div>


                    </div>
