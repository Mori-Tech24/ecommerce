<?php
    include "includes/session.php";
    $conn = $pdo->open();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $dev_projectname; ?> | Log in</title>
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
  
       

      <form id="frm_login" action="index_act" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txt_username" id="txt_username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
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
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block" name="login" value="Sign In">
            <div class="auth_message mt-2"></div>
          </div>
        <!-- /.col -->
        </div>
      </form>
      <a href="register" class="pull-left">Register Here</a>
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
        $('form#frm_login').validate({
            rules: {
                txt_username: {
                    required: true,
                },
                txt_password: {
                    required: true,
                },
            },
            messages: {
                txt_username: {
                    required    : "Please Enter Your Username",
                },
                txt_password: {
                    required    :  "Please Enter Your Password",
                },

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