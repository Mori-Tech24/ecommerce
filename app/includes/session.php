<?php
    include '../includes/conn.php';
	session_start();


    if(empty($_SESSION['SESS_USER_ID'])){
        header('location: ../index');
        exit();
    }else if ($_SESSION['SESS_USER_TYPE'] != 1){
        header('location: ../index');
        exit();

    }else {
        $conn = $pdo->open();
        $todaysDate =  date("Y-m-d"); 
        $added_by = $_SESSION['SESS_USER_ID'];

        // function genRandomStr($length) {
        //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //     $charactersLength = strlen($characters);
        //     $randomString = '';
        //     for ($i = 0; $i < $length; $i++) {
        //         $randomString .= $characters[random_int(0, $charactersLength - 1)];
        //     }
        //     return $randomString;
        // }

        // function checkPhotoifExist($imagename) {

        //     if($imagename == "") {
        //         return "../assets/images/emp/no_image_available.jpg";
        //     }else {
        //         if (file_exists("../assets/images/emp/$imagename")) {
        //             return "../assets/images/emp/$imagename";
        //         } else {
        //             return "../assets/images/emp/no_image_available.jpg";
                    
        //         }
        //     }
        // }
    }
?>