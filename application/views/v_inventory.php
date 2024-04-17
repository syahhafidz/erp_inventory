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
            <h3 class="card-title">Inventory <?php echo $_SESSION['username'] == 'admin' ? '<button style="margin-left:20px;" class="btn btn-sm btn-success" token="' . $_SESSION['token'] .'" onclick="inv.showAddInventory(this, event)">Tambah Inventory</button>' : ''?></h3>
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
                  <th>Nama Barang</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($get_invetory as $gi){ ?>
                <tr>
                  <td><?php echo $gi['nama_barang']?></td>
                  <td><?php echo $gi['qty_barang']?></td>
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