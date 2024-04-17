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
            <h3 class="card-title">Perminaan Inventory Masuk <?php echo $_SESSION['username'] == 'hafidz' ? '<button style="margin-left:20px;" class="btn btn-sm btn-success" token="' . $_SESSION['token'] .'" onclick="penerimaan.addPenerimaan(this, event)">Tambah Penerimaan</button>' : ''?></h3>
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
            <table class="table table-bordered" style="font-size:12px;">
              <thead>
                <tr>
                  <th>No. Penerimaan</th>
                  <th>Nama Customer</th>
                  <th>Alamat Customer</th>
                  <th>Status Sales Order</th>
                  <th>Barang</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($purchase_order as $po){ ?>
                <tr>
                  <td><?php echo $po['no_penerimaan'] ?></td>
                  <td><?php echo $po['nama_supp']?></td>
                  <td><?php echo $po['alamat_sup']?></td>
                  <td style="background-color:<?php echo $po['status_penerimaan'] == 'APPROVE' ? '#34e38c' : '#ff8a80'?>"><?php echo $po['status_penerimaan']?></td>
                  <td><?php echo $po['nama_barang']?></td>
                  <td>
                    <button class="btn btn-sm btn-secondary">Edit</button>
                    <button class="btn btn-sm btn-warning">Hapus</button>

                    <?php if($_SESSION['username'] == 'admin' && $po['status_penerimaan'] == 'DRAFT'){ ?>
                      <button class="btn btn-sm btn-success" qty="<?php echo $po['qty'] ?>"  id_barang="<?php echo $po['id_barang'] ?>" nomorpo="<?php echo $po['no_penerimaan'] ?>" status="APPROVE" onclick="penerimaan.setStatusPenerimaan(this,event)">Approve</button>
                      <button class="btn btn-sm btn-danger" qty="<?php echo $po['qty'] ?>"   id_barang="<?php echo $po['id_barang'] ?>" nomorpo="<?php echo $po['no_penerimaan'] ?>" status="REJECT" onclick="penerimaan.setStatusPenerimaan(this,event)">Reject</button>
                    <?php } ?>
                  </td>
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