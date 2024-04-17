<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300400400i700&display=fallback">
<link rel="stylesheet" href="<?php echo $base_url ?>/assets/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo $base_url ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="<?php echo $base_url ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $base_url ?>/assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="<?php echo $base_url ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="<?php echo $base_url ?>/assets/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo $base_url ?>/assets/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="<?php echo $base_url ?>/assets/plugins/fullcalendar/main.css">
<?php $logo = $this->index[0]['doc_filetype'] . ';' . $this->index[0]['doc_encrypt'] ?>
<link rel="icon" type="image/x-icon" href="assets/img/logo.jpg">
<!-- <link rel="icon" type="image/x-icon" href="assets/img/logo.png"> -->

<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> -->

<div class="loader">

</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light" style=" z-index: 2000;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" style="margin-top: -5px;">ERP Inventory <i class="mdi mdi-chevron-right"><?php echo $sub_title ?></i> </a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> -->


        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> -->
        <li class="nav-item">
            <button class="btn btn-primary" style="background-color: #0045BD; border:none " onclick=" dc.logout(this, event)"><i class="mdi mdi-logout mdi-24px"></i></button>
            <!-- <a href="#" onclick=" Home.logout(this, event)"><i class="mdi mdi-logout mdi-24px"></i></a> -->
        </li>
    </ul>
</nav>