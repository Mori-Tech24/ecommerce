<?php
    include "includes/session.php";
    $conn = $pdo->open();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $dev_projectname; ?> | Registration</title>
  <link rel="icon" type="image/x-icon" href="images/cover.jpg">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- <div class="login-logo">
    <a href="index2.html"><b>Dudings</b><br> Inventory Management System</a>
  </div> -->
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <div class="text-center">
            <img src="images/cover.jpg" class="rounded-circle" width="50%">
    </div>
    
        <h1 class="login-box-msg">    
            <?php echo $dev_projectname; ?> </h3>
          <h3 class="text-center"> <i>
          <?php echo $dev_projectsystemname ; ?>
          </i>
          </h3>
  
       

      <form id="frm_register" action="index_act.php" method="post">

        <label class="text-primary">Basic Information</label>


        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txt_lastname" id="txt_lastname" placeholder="Lastname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txt_firstname" id="txt_firstname" placeholder="Firstname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txt_middlename" id="txt_middlename" placeholder="Middlename">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
            <select class="form-control" name="txt_gender" id="txt_gender">
                <option value="">Select Gender</option>
                <?php 
                    try {
                        $getGender = $conn->prepare("SELECT * FROM tbl_setup_gender");
                        $getGender->execute();
    
                        foreach($getGender as $rowGender) {
                            $gender_id = $rowGender['id'];
                            $gender_name = $rowGender['gender_name'];


                            echo "<option value='$gender_id'>$gender_name</option>";
                        }

                    }catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                    
                    $pdo->close();
                
                ?>
            </select>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txt_email" id="txt_email" placeholder="Email Address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-at"></span>
            </div>
          </div>
        </div>


        <label class="text-primary">Security</label>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txt_username" id="txt_username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txt_password" id="txt_password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txt_passwordconf" id="txt_passwordconf"  placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
            <div class="auth_message mt-2"></div>
          </div>
        <!-- /.col -->
        </div>
      </form>
      <a href="index" class="pull-left">Back to Home</a>

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/custom.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
</body>
</html>

<script>
    $(function() {
        $('form#frm_register').validate({
            rules: {
                txt_lastname: {
                    required: true,
                },
                txt_firstname: {
                    required: true,
                },
                txt_gender: {
                    required: true,
                },
                txt_username: {
                    required: true,
                },
                txt_password: {
                    required: true,
                },
                txt_passwordconf: {
                    required: true,
                    equalTo : "#txt_password"
                },
            },
            messages: {
                txt_lastname: {
                    required    : "Please Enter Your Lastname",
                },
                txt_firstname: {
                    required    :  "Please Enter Your Firstname",
                },
                txt_gender: {
                    required    :  "Please Select Your Gender",
                },
                txt_username: {
                    required    :  "Please Enter Your Username",
                },
                txt_password: {
                    required    :  "Please Enter Your Password",
                },
                txt_passwordconf: {
                    required    :  "Please Retype Your Password",
                    equalTo: "Please retype your password Correctly"
                }

            },
            errorElement: 'span',
                errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.mb-3').append(error);
            },
                highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
                unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }, 
            submitHandler: function(form) {

                $.ajax({
                    url     : form.action,
                    type    : form.method,
                    data    : $(form).serialize(),
                    dataType: "json",
                    beforeSend : function() {
                        $(".auth_message").html("");
                    },
                    success: function(response) {
              
                        $(".auth_message").html(transaction_message(response[0], response[1], response[2]));
                        if(response[0] =="success") {

                            setTimeout(function(){  location.reload(); }, 1000);
                        }

                        

                    },
                });
            
            }
        });

    });



</script>