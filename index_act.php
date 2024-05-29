<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])) {
		$username 	= $_POST['txt_username'];
		$password 	= $_POST['txt_password'];

		try{   

            $stmt = $conn->prepare("SELECT 
								a.*, b.usertype_name 
							FROM tbl_users a
							LEFT JOIN
							tbl_usertype b ON b.id = a.usertype_id WHERE a.username = :username
						");
            $stmt->execute(['username'=>$username]);
            $countstmt = $stmt->rowCount();

            if($countstmt == 0) {
                $output = array("danger","Error", "Invalid Username or Password.");
            }else {
                $ftc = $stmt->fetch();

                if(password_verify($password, $ftc['password'])){

					if($ftc['isDeleted']) {

						$output = array("danger","Error", "Account Deativated.");
					}else {

						$_SESSION['SESS_USER_ID'] = $ftc['id']; 
						$_SESSION['SESS_USER_TYPE'] = $ftc['usertype_id']; 
						$_SESSION['SESS_USER_TYPE_NAME'] = $ftc['usertype_name']; 
						$_SESSION['SESS_USER_LASTNAME'] = $ftc['lastname']; 
						$_SESSION['SESS_USER_FIRSTNAME'] = $ftc['firstname'];
						$_SESSION['SESS_USER_MIDDLENAME'] = $ftc['middlename'];
						$_SESSION['SESS_USER_ADDEDDATE'] = $ftc['added_date'];
						$_SESSION['SESS_USER_PHOTO'] = $ftc['user_photo'];
						$output = array('success', 'Success', 'Redirecting...');
					}

     


                }else {
                    $output = array("danger","Error", "Invalid Username or Password.");
                }

            }
                


		
		}catch(PDOException $e){
            $output = $e->getMessage();
		}
	

		$pdo->close();
		echo json_encode($output);
		exit();
	}

	if(isset($_POST['register'])) {
		$lastname 	= (empty($_POST['txt_lastname'])) ? NULL : $_POST['txt_lastname'];
		$firstname 	= (empty($_POST['txt_firstname'])) ? NULL : $_POST['txt_firstname'];
		$middlename = $_POST['txt_middlename'];
		$gender	 	=  (empty($_POST['txt_gender'])) ? NULL : $_POST['txt_gender'];
		$email	 	= $_POST['txt_email'];
		$username	 	= $_POST['txt_username'];
		$password	 	= $_POST['txt_password'];
		
		try{   

            $stmt = $conn->prepare("INSERT INTO tbl_users(lastname, 
										firstname, 
										middlename, 
										gender_id, 
										email_address, 
										usertype_id, 
										username, 
										password
									)VALUES
										(:lastname, 
										:firstname, 
										:middlename, 
										:gender_id, 
										:email_address, 
										:usertype_id, 
										:username, 
										:password
									)");
            $stmt->execute(['lastname'=>$lastname, 'firstname'=>$firstname, 'middlename'=>$middlename, 'gender_id'=>$gender, 'email_address'=>$email,
										'usertype_id'=>2, 'username'=>$username, 'password'=> password_hash($password, PASSWORD_DEFAULT) ]);
										
                
			if($stmt) {
				$output = array('success', 'Success', 'Successfully Registered');
			}else {
				$output = array("danger","Error", $stmt);
			}

		
		}catch(PDOException $e){
			if (str_contains($e->getMessage(), 'username')) { 
				$output = array("danger","Error", "Invalid Username");
			}else {
				$output = array("danger","Error", $e->getMessage());
			}

	
		}
	

		$pdo->close();
		echo json_encode($output);
		exit();
	}

	
	// if(isset($_POST['reset'])) {
	// 	$input_empno 	= $_POST['input_empno'];
	// 	$input_dob 		= $_POST['input_dob'];

	// 	try{

	// 		$stmt = $conn->prepare("SELECT row1 from vw_users_info where row2 = :row2 and row22 = :row22 AND row44 != 2");              
	// 		$stmt->execute(['row2'=>$input_empno, 'row22'=>$input_dob]);
	// 		$countStmt = $stmt->rowCount();

	// 		if($countStmt == 0) {
	// 			$output = array('error','Error', 'Invalid Details.');
	// 		}else {
	// 			$ftcstmt = $stmt->fetch();
	// 			$id = $ftcstmt['row1'];
	// 			$newPass = uniqid();
	// 			$password      = password_hash($newPass, PASSWORD_DEFAULT);  
             
	// 			$stmtupdatePass = $conn->prepare("CALL sp_forgot_pass(:in_id, :in_passnew)");
	// 			$stmtupdatePass->execute(['in_id'=>$id, 'in_passnew'=>$password ]);

	// 			if($stmtupdatePass) {
	// 				$ftc = $stmtupdatePass->fetch();
	// 				$output = array($ftc['responseType'], $ftc['responseTitle'], $ftc['responseMessage'] . " Your new Password is <b>". $newPass ."</b>");
					
	// 				// update unlocked status
	// 				$stmtupdatePass->closeCursor();
	// 				$stmtunlocked = $conn->prepare("
	// 					UPDATE tbl_users_account SET lock_count = NULL, lock_date = NULL, unlocked = 1 WHERE user_id = :id
	// 				");
	// 				$stmtunlocked->bindParam(":id", $id);
	// 				$stmtunlocked->execute();

	// 				// record unlock logs
	// 				$stmtlocklog = $conn->prepare("
	// 					INSERT INTO tbl_account_lock_logs (
	// 						user_id, employee_id, user_name, log_type, log_time
	// 					) VALUES (
	// 						:userid, :emid, NULL, 'account unlocked', CURDATE()
	// 					)
	// 				");
	// 				$stmtlocklog->bindParam("userid", $id);
	// 				$stmtlocklog->bindParam(":emid", $input_empno);
	// 				$stmtlocklog->execute();

	// 			}else {
	// 				$output = array('error', 'Error', $stmtupdatePass);

	// 			}
				
	// 		}
	// 	}catch(PDOException $e){
    //         $output = $e->getMessage();
	// 	}
	
	
	// 	$pdo->close();
	// 	echo json_encode($output);
	// 	exit();
	// }
	

?>