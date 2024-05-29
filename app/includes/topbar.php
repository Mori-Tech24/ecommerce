  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
        <li class="nav-item dropdown user-menu show">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <img src="<?php echo "../images/users/".$_SESSION['SESS_USER_PHOTO']?>"  class="user-image img-circle elevation-2" onerror="this.onerror=null;this.src='../images/users/noimageico.png'" alt="User Image">
            <span class="d-none d-md-inline"><?php echo $_SESSION['SESS_USER_LASTNAME'].", ". $_SESSION['SESS_USER_FIRSTNAME']?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <li class="user-header bg-primary">
            <img src="<?php echo "../images/users/".$_SESSION['SESS_USER_PHOTO']?>" class="img-circle elevation-2"  onerror="this.onerror=null;this.src='../images/users/noimageico.png'"  alt="User Image">
            <p>
            <?php echo $_SESSION['SESS_USER_LASTNAME'].", ". $_SESSION['SESS_USER_FIRSTNAME']?> - <?php echo $_SESSION['SESS_USER_TYPE_NAME'] ?>
            <small>Member since <?php echo date_format(date_create($_SESSION['SESS_USER_ADDEDDATE']),'M. Y') ?></small>
            </p>
            </li>

            <!-- <li class="user-body">
                <div class="row">
                <div class="col-4 text-center">
                <a href="#">Followers</a>
                </div>
                <div class="col-4 text-center">
                <a href="#">Sales</a>
                </div>
                <div class="col-4 text-center">
                <a href="#">Friends</a>
                </div>
                </div>
            </li> -->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <a href="../logout" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>

    </ul>
  </nav>