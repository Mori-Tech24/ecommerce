
<?php 
    include "includes/session.php";
    include "includes/header.php";
    include "includes/topbar.php";
    include "includes/sidebar.php";
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                <div class="inner">
                <h3>150</h3>
                <p>Total Products</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                <div class="inner">
                <h3>₱ 6,500.00</h3>
                <p>Todays Sale</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php 
                            try {
                                $getTotalRegistered = $conn->prepare("SELECT id FROM tbl_users WHERE usertype_id = :usertype_id AND isDeleted = :isDeleted");
                                $getTotalRegistered->execute(['usertype_id'=>2, 'isDeleted'=>0]);
                                $countgetTotalRegistered = $getTotalRegistered->rowCount();
    
                                echo "<h3>$countgetTotalRegistered</h3>";
                            }catch(PDOException $e) {

                                echo $e->getMessage();
                            }
                            
                            $pdo->close();
                        ?>
                    <h3></h3>
                    <p>User Registered</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                <div class="inner">
                <h3>20</h3>
                <p>Item Nearly out of stock</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-9">
                    <div class="card  card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Today's Sold</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>GSHI *2926 Large</td>
                                            <td><img src="../images/items/bag1.jpg" class="img-circle img-size-32 mr-2"></td>
                                            <td>x(1)</td>
                                            <td>₱2,000.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Graphic Patch Denim Jacket</td>
                                            <td><img src="../images/items/jacket1.jpg" class="img-circle img-size-32 mr-2"></td>
                                            <td>x(1)</td>
                                            <td>₱4,500.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Round Neck Shirt Black Tshirt</td>
                                            <td><img src="../images/items/tshirt1.jpg" class="img-circle img-size-32 mr-2"></td>
                                            <td>x(2)</td>
                                            <td>₱500.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Recently Registered Users</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date Added</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            try {
                                                $getrecentUsers = $conn->prepare("SELECT * FROM tbl_users WHERE usertype_id = :usertype_id  ORDER BY id DESC LIMIT 5");
                                                $getrecentUsers->execute(['usertype_id'=>2]);
    
                                                $countgetrecentUsers = $getrecentUsers->rowCount();
    
                                                if($countgetrecentUsers == 0) {
                                                    echo "<tr>
                                                            <th colspan='3' class='text-danger'>No Users Added Yet</th>
                                                        </tr>";
    
                                                }else {

                                                    foreach($getrecentUsers as $rowgetrecentUsers) {
                                                        $imageError = 'this.src="../images/users/noimageico.png"';
                                                        echo "<tr>
                                                                <th><img class='direct-chat-img' src='../images/users/".$rowgetrecentUsers['user_photo']."' onerror='".$imageError."'></th>
                                                                <th>".$rowgetrecentUsers['lastname'].", ".$rowgetrecentUsers['firstname']."</th>
                                                                <th>".$rowgetrecentUsers['added_date']."</th>
                                                            </tr>";

                                                    }
                                     
    
                                                }
                                            }catch(PDOException $e) {
                                                echo $e->getMessage();
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>



            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php include "includes/footer.php"?>
<script>
    $(function() {

    


    });



</script>