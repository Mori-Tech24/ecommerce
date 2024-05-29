
<?php 
    include "includes/session.php";
    $productid = $_GET['UETKyt5GSVBygekTdctU958msmYMl1'];

    $checkProductExist = $conn->prepare("SELECT * FROM tbl_products WHERE id = :id");
    $checkProductExist->execute(['id'=>$productid]);
    $countcheckProductExist = $checkProductExist->rowCount();

    if($countcheckProductExist == 0) {
        header("Location: ../page_not_found");
    }else {
        $ftc_product_details = $checkProductExist->fetch();

        $product_image  = imageExist($ftc_product_details['product_image']);
        $product_name   = $ftc_product_details['product_name'];
        $product_description   = $ftc_product_details['product_description'];
        $product_srp_kg   =   "&#8369;" .number_format($ftc_product_details['srp_kg'], 2, '.', ',');
        $product_min_stock =  number_format($ftc_product_details['min_stock']);
    }
    include "includes/header.php";
    include "includes/topbar.php";
    include "includes/sidebar.php";

?>
<div class="content-wrapper">

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="products">Products</a></li>
                    <li class="breadcrumb-item active">Product Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"><?php echo $product_name; ?><</h3>
                    <div class="col-12">
                        <img src="<?php echo $product_image; ?>" class="product-image" alt="Product Image">
                    </div>
                    <!-- <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="<?php echo $product_image; ?>" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                    </div> -->
                </div>
                <div class="col-12 col-sm-6">

                <div class="row">
                    <div class="col-md-3" id="editable_product_name_text"> <h3 class="my-3 capitalize-words" id="edit_editable_product_name_text"><?php echo $product_name; ?></h3> </div>
                    <div class="col-md-6 d-none" id="editable_product_name_input" > <input type="text" class="form-control mt-3" id="edit_editable_product_name_input"  value="<?php echo $product_name; ?>"></div>
                    <i class="text-primary fas fa-edit mt-4" style="cursor: pointer;" id="edit_product_name"> Edit Product Name</i>
                  
                </div>

        
                <div class="row">
                    <div class="col-md-9" id="editable_product_description_text"> <p id="edit_editable_product_description_text"><?php echo $product_description; ?></p> </div>
                    <div class="col-md-9 d-none" id="editable_product_description_input" > <input type="text" class="form-control" id="edit_editable_product_description_input"  value="<?php echo $product_description; ?>"></div>
                    <i class="text-primary fas fa-edit mt-1" style="cursor: pointer;" id="edit_product_description"> Edit Description</i>
                 
                </div>

                <!-- <h3 class="my-3" id="editable_product_name_text"><?php echo $product_name; ?></h3>  <span class=""> <input type="text" class="" id="editable_product_name_input" value="<?php echo $product_name; ?>"></span> <i class="text-primary fas fa-edit" style="cursor: pointer;" id="edit_product_name"></i>
                 -->
                <!-- <p>Description: <?php echo $product_description; ?> <i class="text-primary fas fa-edit"></i></p>
             -->

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" width="40%">Supplier Srp Price <i class="text-primary fas fa-edit"></i></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Available Stock</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Mark Up %</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Min Stock. <i class="text-primary fas fa-edit"  style="cursor: pointer;" id="edit_product_min_stock"></i></th>
                            <td><label id="editable_product_min_stock_text"><?php echo $product_min_stock; ?></label> <input type="text" class="form-control d-none" id="editable_product_min_stock_input" value="<?php echo $product_min_stock; ?>"></td>
                        </tr>
                    </tbody>
                </table>

 
      

                <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                <?php echo $product_srp_kg. " SRP / Kg"; ?>
                </h2>
                <!-- <h4 class="mt-0">
                <small>Ex Tax: $80.00 </small>
                </h4> -->
                </div>
                <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                Add to Cart
                </div>
                <div class="btn btn-default btn-lg btn-flat">
                <i class="fas fa-heart fa-lg mr-2"></i>
                Add to Wishlist
                </div>
                </div>
                <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                <i class="fas fa-rss-square fa-2x"></i>
                </a>
                </div>
                </div>
            </div>
        <div class="row mt-4">
        <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
        </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
        </div>
        </div>
        </div>

    </div>

</section>

<?php include "includes/footer.php"?>

<script>
    var product_id = "<?php echo $productid ?>";
</script>
<script src="js/products_details.js"></script>


</body>
</html>
