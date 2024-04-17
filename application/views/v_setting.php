<?php foreach ($header as $arr) { ?>
  <?php echo $arr ?>
<?php } ?>

<style>
  .checked {
    color: orange;
  }
</style>
<title><?php echo $title ?></title>

<body class="hold-transition sidebar-mini layout-fixed" style="height:1200px">
  <div class="content-wrapper">
    <section class="content">
      <br>
      <div class="container">

        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Setting User <button style="margin-left:20px;" class="btn btn-sm btn-success" token="<?php echo $_SESSION['token'] ?>" onclick="cu.addUser(this, event)">Tambah User</button></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <label for="">Belum ada fitur</label>
          </div>
        </div>
        <hr>

        
        </div>
    </section>
  </div>
</body>