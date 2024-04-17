<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <!-- <img src="assets/img/logo.png" alt="HRIS Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">ERP Inventory</span>
    </a>

    <?php 
         $sql = "select * from tbl_role where id_user ='".$account_login[0]['id']."'";
         $role_menu = $this->db->query($sql)->result_array();

        //  echo '<pre>';print_r($db);die;
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/img/logo.jpg" class="img-circle elevation-2" style="height: 50px; width:50px" alt="User Image">
            </div>
            <div class="info">
                <a data-toggle="modal" data-target="#modal-account" class="d-block"><?php echo $userlogin ?></a>
                <!-- <a style="font-size: 12px;"> < ?php echo $userlogin[0]['deskripsi_role'] ?></a> -->
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo base_url() ?>dashboard" onclick="openLoad()" class="<?php echo $title == 'Dashboard' ? 'nav-link active' : 'nav-link' ?>">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">Menu</li>

                <?php foreach($role_menu as $rm){ ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . trim($rm['access_controller']) ?> " onclick="openLoad()" class="<?php echo $sub_title == trim($rm['nama_module']) ? 'nav-link active' : 'nav-link' ?>">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                <?php echo $rm['nama_module']?>
                            </p>
                        </a>
                    </li>
                <?php } ?>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

<!-- 
<script>
    document.getElementById('file').addEventListener('change', function() {
        if (this.files[0]) {
            var picture = new FileReader();
            picture.readAsDataURL(this.files[0]);
            picture.addEventListener('load', function(event) {
                document.getElementById('uploadedImage').setAttribute('src', event.target.result);
            });
        }
    });
</script> -->