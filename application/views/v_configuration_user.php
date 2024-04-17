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
            <h3 class="card-title">Daftar User <button style="margin-left:20px;" class="btn btn-sm btn-success" token="<?php echo $_SESSION['token'] ?>" onclick="cu.addUser(this, event)">Tambah User</button></h3>
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

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="text-align:center;">Username</th>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">Alamat</th>
                  <th style="text-align:center;">Tanggal Lahir</th>
                  <th style="text-align:center;">No. Telp</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data_user as $du){?>
                <tr>
                  <td><?php echo $du['username'] == null ? '-' : $du['username'] ?></td>
                  <td><?php echo $du['nama'] == null ? '-' : $du['nama'] ?></td>
                  <td><?php echo $du['alamat']  == null ? '-' : $du['alamat'] ?></td>
                  <td><?php echo $du['tgl_lahir']  == null ? '-' : $du['tgl_lahir']?></td>
                  <td><?php echo $du['no_telp']  == null ? '-' : $du['no_telp'] ?></td>
                </tr>
                <?php } ?>
              </tbody>

            </table>


          </div>
        </div>
        <hr>


        
        </div>
    </section>
  </div>
</body>