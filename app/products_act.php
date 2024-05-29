<?php
    include "includes/session.php";


    if(isset($_POST['product'])) {

        $product_name = ucwords($_POST['text_1']);
        $product_description = $_POST['text_11'];
        $product_image = NULL;
        $supplier_price = str_replace(',', '', $_POST['text_2']);
        $quantity =  str_replace(',', '', $_POST['text_3']); 
        $srp_kg =  str_replace(',', '', $_POST['text_4']); 
        $profit_ten_percent =  str_replace(',', '', $_POST['text_5']); 
        $profit_ten_percent_round =  str_replace(',', '', $_POST['text_6']); 
        $est_per_kg =  str_replace(',', '', $_POST['text_7']); 
        $actual_srp =  str_replace(',', '', $_POST['text_8']); 
        $profit_per_kg =  str_replace(',', '', $_POST['text_9']); 
        $markup_percent =  str_replace(',', '', $_POST['text_10']); 
  
        try {
            $stmt = $conn->prepare("INSERT INTO tbl_products(
                    product_name, product_image, product_description, supplier_srp_price, quantity, srp_kg, markup_percentage, profit_ten_percent, profit_ten_percent_round,
                    est_per_kg, acutal_srp, profit_per_kg, added_by)
                    VALUES
                    (:product_name, :product_image, :product_description, :supplier_srp_price, :quantity, :srp_kg, :markup_percentage, :profit_ten_percent, :profit_ten_percent_round,
                    :est_per_kg, :acutal_srp, :profit_per_kg, :added_by)
            
            ");

            $stmt->execute(['product_name'=>$product_name, 'product_image'=>$product_image, 'product_description'=>$product_description, 'supplier_srp_price'=>$supplier_price,
                'quantity'=>$quantity,  'srp_kg'=>$srp_kg, 'markup_percentage'=>$markup_percent, 'profit_ten_percent'=>$profit_ten_percent, 'profit_ten_percent_round'=>$profit_ten_percent_round, 'est_per_kg'=>$est_per_kg,
                'acutal_srp'=>$actual_srp, 'profit_per_kg'=>$profit_per_kg, 'added_by'=>$added_by

            ]);

            if($stmt) {
                $output = array("success","Success", "Product Added");
            }else {
                $output = array("danger","Error", $stmt);
            }


        }catch(PDOException $e) {
            $output = array("danger","Error", $e->getMessage());

        }

        echo json_encode($output);

        $pdo->close();
    }

    
    if(isset($_POST['tbl_products'])) {


        $stmt = $conn->prepare("SELECT * FROM tbl_products");
        $stmt->execute();
        $records = $stmt->fetchAll();
        $data = array();
        foreach($records as $row){
            // number_format($row['quantity'], 2, '.', ',');

            $row1           = $row['id'];
            $row2           = $row['product_name'];
            $row3           = $row['product_image'];
            $row4           = "&#8369;".number_format($row['supplier_srp_price'], 2, '.', ',');
            $row5           = ($row['quantity'] <= $row['min_stock']) ? "<label class='text-danger'>".number_format($row['quantity'], 2, '.', ',')."</label>" : "<label class='text-success'>".number_format($row['quantity'], 2, '.', ',')."</label>" ;
            $row6           = number_format($row['srp_kg'], 2, '.', ',');
            $row7           = number_format($row['profit_ten_percent'], 2, '.', ',');
            $row8           = number_format($row['profit_ten_percent_round'], 2, '.', ',');
            $row9           = number_format($row['est_per_kg'], 2, '.', ',');
            $row10          = number_format($row['acutal_srp'], 2, '.', ',');
            $row11          = number_format($row['profit_per_kg'], 2, '.', ',');
            $row12          = number_format($row['markup_percentage'], 2, '.', ',');
            $row13           = $row['isDeleted'];
            $data[] = array(
               "row1"=>$row1,
               "row2"=>$row2,
               "row3"=>$row3,
               "row4"=>$row4,
               "row5"=>$row5,
               "row6"=>$row6,
               "row7"=>$row7,
               "row8"=>$row8,
               "row9"=>$row9,
               "row10"=>$row10,
               "row11"=>$row11,
               "row12"=>$row12,
               "row13"=>$row13,
            );
        }
        $response = array(
            "aaData" => $data
        );

        echo json_encode($response);
        $pdo->close();
    }
    
?>