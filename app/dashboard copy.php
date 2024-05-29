
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
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $getTodaysSale = $conn->prepare("SELECT SUM(quantity * actual_srp) AS todays_sale
                  FROM tbl_transaction
                  WHERE DATE(action_date) = CURDATE()");
                  $getTodaysSale->execute();

                  $ftc_getTodaysSale = $getTodaysSale->fetch();

                  echo "<h3>₱ ".number_format($ftc_getTodaysSale['todays_sale'], 2, '.', '')."</h3>";
                ?>

                <p>Today's Sale</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $getTodaysProfit = $conn->prepare("SELECT SUM(quantity * profit) AS todays_profit
                  FROM tbl_transaction
                  WHERE DATE(action_date) = CURDATE()");
                  $getTodaysProfit->execute();

                  $ftc_getTodaysProfit = $getTodaysProfit->fetch();

                  echo "<h3>₱ ".number_format($ftc_getTodaysProfit['todays_profit'], 2, '.', '')."</h3>";
                ?>

                <p>Today's Profit</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $getTotalUsers = $conn->prepare("SELECT id FROM tbl_users WHERE isDeleted = :isDeleted");
                  $getTotalUsers->execute(['isDeleted'=>0]);

                  $countgetTotalUsers = $getTotalUsers->rowCount();

                  echo "<h3>".$countgetTotalUsers."</h3>";
                ?>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $getminimumstock = $conn->prepare("SELECT id FROM tbl_products WHERE quantity <= min_stock AND isDeleted = :isDeleted");
                  $getminimumstock->execute(['isDeleted'=>0]);

                  $countgetminimumstock = $getminimumstock->rowCount();

                  echo "<h3>".$countgetminimumstock."</h3>";
                ?>

                <p>Minimum Stock Reached</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title font-weight-bold">Today's Transaction</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                            </a>
                            <!-- <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                            </a> -->
                        </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Transaction No.</th>
                                        <th>Transaction By</th>
                                        <th>Sales</th>
                                        <th>Profit</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                     
                            <?php 
                                $getTodaysTransaction = $conn->prepare("SELECT a.*,
                                    b.lastname, b.firstname, b.middlename, b.user_photo,
                                    SUM(a.actual_srp * a.quantity) AS todaysale,
                                    SUM(a.profit * a.quantity) AS todayprofit,
                                    TIME_FORMAT(a.action_date, '%r') as todaytime
                                 FROM tbl_transaction a 
                                LEFT JOIN tbl_users b on b.id = a.action_by
                                
                                WHERE DATE(a.action_date) = CURDATE() 
                                GROUP BY a.transaction_no
                                ORDER BY a.action_date DESC
                                ");
                                $getTodaysTransaction->execute();
                                $countgetTodaysTransaction = $getTodaysTransaction->rowCount();

                                if($countgetTodaysTransaction == 0) {

                                    echo "<tr>
                                            <td>No Transaction Today.</td>
                                        </tr>";

                                }else {
                                    foreach($getTodaysTransaction as $rowgetTodaysTransaction) {
                                        echo "  <tr>
                                                    <td>".$rowgetTodaysTransaction['id']."</td>
                                                    <td>".$rowgetTodaysTransaction['transaction_no']."</td>
                                                    <td> <img src='../images/users/".$rowgetTodaysTransaction['user_photo']."' class='img-circle img-size-32 mr-2'>".$rowgetTodaysTransaction['lastname'].", ".$rowgetTodaysTransaction['firstname']. " ".$rowgetTodaysTransaction['middlename']."</td>
                                                    <td>₱ ".number_format($rowgetTodaysTransaction['todaysale'], 2, '.', '')."</td>
                                                    <td>₱ ".number_format($rowgetTodaysTransaction['todayprofit'], 2, '.', '')."</td>
                                                    <td>".$rowgetTodaysTransaction['todaytime']."</td>
                                                    <td><a href='#'>View Transaction</a></td>
                                                  </tr>";
                                    }
                             

                                }
                                
                                $pdo->close();

                            ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title font-weight-bold">Recent Sold Product</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th class="d-none">#</th>
                                            <th>Photo</th>
                                            <th>Product Name</th>
                                            <th>Pcs</th>
                                        </tr>
                                    </thead>
                                <tbody>
                     
                                <?php 
                                    $recentpurchaseItem = $conn->prepare("SELECT 
                                        a.id,
                                        a.product_id,
                                        b.product_name,
                                        b.product_image,
                                        a.quantity
                                    FROM 
                                        tbl_transaction a
                                    LEFT JOIN
                                        tbl_products b ON b.id = a.product_id
                                    WHERE
                                        DATE(a.action_date) = CURDATE()
                                    ORDER BY a.id DESC LIMIT 10");

                                    $recentpurchaseItem->execute();
                                    $countrecentpurchaseItem = $recentpurchaseItem->rowCount();
                                    
                                    if($countrecentpurchaseItem == 0) {

                                        echo "<tr>
                                                <td>
                                                    No Product Sold Today
                                                </td>
                                            </tr>";


                                    }else {

                                        foreach($recentpurchaseItem as $rowrecentpurchaseItem) {
                                            $onerrorimage = '<img src=../images/products/'.$rowrecentpurchaseItem['product_image']." class='img-circle img-size-32 mr-2'
                                                onerror=this.onerror=null;this.src='../images/products/no_image_available.jpg'
                                            ";
                                            
                                            // "this.onerror=null;this.src='../images/products/no_image_available.jpg'";
                                            echo "<tr>
                                                    <td class='d-none'>".$rowrecentpurchaseItem['id']."</td>
                                                    <td>$onerrorimage</td>
                                                    <td>".$rowrecentpurchaseItem['product_name']."</td>
                                                    <td>x(".$rowrecentpurchaseItem['quantity'].")</td>
                                                </tr>";
                                        }

                                    }
                                    
                                    $pdo->close();

                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
        </div>


      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php include "includes/footer.php"?>
<script src="js/dashboard.js"></script>