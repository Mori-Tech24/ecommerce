<?php
    include "includes/session.php";

    if(isset($_POST['change_product_name'])) {
        $prod_id = $_POST['product_id'];
        $prod_name = ucwords($_POST['new_product_name']);

        try {
            $db_prodname = $conn->prepare("SELECT product_name FROM tbl_products WHERE id = :id");
            $db_prodname->execute(['id'=>$prod_id]);
            $ftc_db_prodname = $db_prodname->fetch();

            if($ftc_db_prodname['product_name'] == $prod_name) {
                $output = array("warning", "No Changes Has Been Made", "");
            }else {

                $stmt = $conn->prepare("UPDATE tbl_products SET product_name = :product_name WHERE id = :id");
                $stmt->execute(['product_name'=>$prod_name, 'id'=>$prod_id]);
    
                if($stmt) {
                    $output = array("success", "Success", "Product Name Changed.");
                }else {
                    $output = array("danger", "Error", $stmt);
                }
    

            }



        }catch(PDOException $e) {
            if( str_contains($e->getMessage(), "product_name"  )) {
                $output = array("danger", "Error", "Product Name already used.");
            }else {
                $output = array("danger", "Error", $e->getMessage());
            }
        }

        echo json_encode($output);
        $pdo->close();

    }

    if(isset($_POST['change_product_description'])) {
        $prod_id = $_POST['product_id'];
        $prod_description = $_POST['new_product_description'];

        try {
            $db_proddescription = $conn->prepare("SELECT product_description FROM tbl_products WHERE id = :id");
            $db_proddescription->execute(['id'=>$prod_id]);
            $ftc_db_proddescription = $db_proddescription->fetch();

            if($ftc_db_proddescription['product_description'] == $prod_description) {
                $output = array("warning", "No Changes Has Been Made", "");
            }else {

                $stmt = $conn->prepare("UPDATE tbl_products SET product_description = :product_description WHERE id = :id");
                $stmt->execute(['product_description'=>$prod_description, 'id'=>$prod_id]);
    
                if($stmt) {
                    $output = array("success", "Success", "Product Description Changed.");
                }else {
                    $output = array("danger", "Error", $stmt);
                }
            }

        }catch(PDOException $e) {
                $output = array("danger", "Error", $e->getMessage());
         
        }

        echo json_encode($output);
        $pdo->close();

    }

    if(isset($_POST['change_product_min_stock'])) {
        $prod_id = $_POST['product_id'];
        $new_product_min_stock = $_POST['new_product_min_stock'];

        try {
            $db_proddmin_stock = $conn->prepare("SELECT min_stock FROM tbl_products WHERE id = :id");
            $db_proddmin_stock->execute(['id'=>$prod_id]);
            $ftc_db_proddmin_stock = $db_proddmin_stock->fetch();

            if($ftc_db_proddmin_stock['min_stock'] == $new_product_min_stock) {
                $output = array("warning", "No Changes Has Been Made", "");
            }else {

                $stmt = $conn->prepare("UPDATE tbl_products SET min_stock = :min_stock WHERE id = :id");
                $stmt->execute(['min_stock'=>$new_product_min_stock, 'id'=>$prod_id]);
    
                if($stmt) {
                    $output = array("success", "Success", "Product Minimum Stock Changed.");
                }else {
                    $output = array("danger", "Error", $stmt);
                }
            }

        }catch(PDOException $e) {
                $output = array("danger", "Error", $e->getMessage());
         
        }

        echo json_encode($output);
        $pdo->close();

    }

?>