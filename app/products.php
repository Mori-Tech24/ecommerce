<?php 
    include "includes/session.php";
    include "includes/header.php";
    include "includes/topbar.php";
    include "includes/sidebar.php";
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="modal fade mdl_1" id="mdl_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frm_1" method="post" action="products_act.php" >
                    <input type="hidden" name="product">
                    <div class="form-group">
                        <label for="text_1">Product Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control capitalize-words" id="text_1" name="text_1" placeholder="Item Name" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="text_11">Product Description </label>
                        <textarea class="form-control" name="text_11" id="text_11" cols="30" rows="5"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="text_2">Srp Price <span class="text-danger">*</span></label>
                        <input type="text" class="form-control cls_amnt_default_zero cls_amnt_default_decimal" id="text_2" name="text_2" value="0" placeholder="SRP Price">
                    </div>

                    <div class="form-group">
                        <label for="text_3">Qty. / Sack  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control cls_amnt_default_zero cls_amnt_default_decimal" id="text_3" name="text_3" value="0" placeholder="Qty. / Sack">
                    </div>

                    <h4 class="text-primary text_srp "></h4>
                    <div class="form-group d-none">
                        <label for="text_4">SRP. /Kg</label>
                        <input type="text" class="form-control" id="text_4" name="text_4" value="0" placeholder="SRP. /Kg">
                    </div>

                    <div class="form-group">
                        <label for="text_10">Mark Up % <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="text_10" name="text_10" value="10" placeholder="Profit Want">
                    </div>

                    <h4 class="text-primary text_profit"></h4>
                    <div class="form-group d-none">
                        <label for="text_5">Profit 10%</label>
                        <input type="text" class="form-control" id="text_5" name="text_5" value="0" placeholder="Profit 10%">
                    </div>

                    <h4 class="text-primary text_profit_round"></h4>
                    <div class="form-group d-none">
                        <label for="text_6">Profit 10% Round</label>
                        <input type="text" class="form-control" id="text_6" name="text_6" value="0" placeholder="Profit 10% Round">
                    </div>

                    <h4 class="text-primary text_est_perkg"></h4>
                    <div class="form-group d-none">
                        <label for="text_7">Est. Per Kg</label>
                        <input type="text" class="form-control" id="text_7" name="text_7" value="0" placeholder="Est. per Kg">
                    </div>

                    <h4 class="text-primary text_actual_srp"></h4>
                    <div class="form-group d-none">
                        <label for="text_8">Actual Srp</label>
                        <input type="text" class="form-control" id="text_8" name="text_8" value="0" placeholder="Actual Srp">
                    </div>

                    <h4 class="text-primary text_profit_per_kg"></h4>
                    <div class="form-group d-none">
                        <label for="text_9">Profit Per Kg</label>
                        <input type="text" class="form-control" id="text_9" name="text_9" value="0" placeholder="Profit Per Kg">
                    </div>

                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="btn_changes" id="btn_changes" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
        
        <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" id="btn_create">Add Product</button>
        </div>
            <div class="card-body">
             
        
                <div class="table-responsive">
                    <table id="tbl_products" class="table table-stripped table-bordered table-striped tbl_products" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Supplier Price</th>
                                <th scope="col">Qty. / Sack</th>
                                <th scope="col">SRP / Kg</th>
                                <th scope="col">Mark Up %</th>
                                <th scope="col">Profit</th>
                                <th scope="col">Actual Profit</th>
                                <th scope="col">Est. Per Kg</th>
                                <th scope="col">Actual Srp</th>
                                <th scope="col">Profit /Kg</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <?php include "includes/footer.php"?>

    <script src="js/products.js"></script>