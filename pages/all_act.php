<?php
    include "includes/session.php";


    if(isset($_POST['clock'])) {

        // $user_id = $_POST['usrid'];
        $biotype = $_POST['biotype'];


        try {

            $stmt = $conn->prepare("INSERT INTO tbl_attendance(user_id, bio_type) VALUES(:user_id, :bio_type)");
            $stmt->execute(['user_id'=>$added_by, 'bio_type'=>$biotype]);

            if($stmt) {

                $output = array("success", "Succcess", "Success! Attendance Recorded.");
            }else {
                $output = array("danger", "Error",$stmt);
            }



        }catch(PDOException $e) {

            $output = array("danger", "Error", $e->getMessage());
        }

        echo json_encode($output);
        $pdo->close();

    }


?>