
<?php 
    include "includes/session.php";
    include "includes/header.php";
    include "includes/topbar.php";
    include "includes/sidebar.php";
?>
<style>
  
.containers {
    display: flex;
    /* align-items: center; */
    gap: 20px; 
}

.image {
    width: 20%; /* Adjust the size of the image as needed */
    /* height: auto; */
}

.text {
    font-size: 40px; /* Adjust the size of the text as needed */
}
</style>

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
                <div class="col-md-12">
                    <div class="card  card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Recently Bought</h3>
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
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>GSHI *2926 Large</td>
                                            <td><img src="../images/items/bag1.jpg" class="img-circle img-size-32 mr-2"></td>
                                            <td>x(1)</td>
                                            <td>₱2,000.00</td>
                                            <td>2024-04-01</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Round Neck Shirt Black Tshirt</td>
                                            <td><img src="../images/items/tshirt1.jpg" class="img-circle img-size-32 mr-2"></td>
                                            <td>x(2)</td>
                                            <td>₱500.00</td>
                                            <td>2024-05-28</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

 
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php include "includes/footer.php"?>
<script src="js/dashboard.js"></script>