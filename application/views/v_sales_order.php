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
            <h3 class="card-title">Sales Order Draft <?php echo $_SESSION['username'] == 'udin' ? '<button style="margin-left:20px;" class="btn btn-sm btn-success" token="' . $_SESSION['token'] .'" onclick="so.addSalesOrder(this, event)">Tambah Sales Order</button>' : ''?></h3>
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
            <table class="table table-bordered" style="font-size:13px;">
              <thead>
                <tr>
                  <th>No. Sales Order</th>
                  <th>Nama Customer</th>
                  <th>Alamat Customer</th>
                  <th>Status Sales Order</th>
                  <th>Barang</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($sales_order as $so){ ?>
                <tr>
                  <td><?php echo $so['no_so'] ?></td>
                  <td><?php echo $so['nama_customer']?></td>
                  <td><?php echo $so['alamat_customer']?></td>
                  <td style="background-color:<?php echo $so['status_so'] == 'APPROVE' ? '#34e38c' : '#ff8a80'?>"><?php echo $so['status_so']?></td>
                  <td><?php echo $so['nama_barang']?></td>
                  <td>
                    <button class="btn btn-sm btn-secondary">Edit</button>
                    <button class="btn btn-sm btn-warning">Hapus</button>

                    <?php if($_SESSION['username'] == 'hafidz' && $so['status_so'] == 'DRAFT'){ ?>
                      <button class="btn btn-sm btn-success" nomorso="<?php echo $so['no_so'] ?>" status="APPROVE" onclick="so.setStatusSo(this,event)">Approve</button>
                      <button class="btn btn-sm btn-danger" nomorso="<?php echo $so['no_so'] ?>" status="REJECT" onclick="so.setStatusSo(this,event)">Reject</button>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <hr>

        <!-- <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Sales Order Approved</h3>
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
                  <th>No. Sales Order</th>
                  <th>Nama Customer</th>
                  <th>Alamat Customer</th>
                  <th>Status Sales Order</th>
                </tr>
              </thead>
              <tbody>
                < ?php foreach($sales_order as $so){ ?>
                <tr>
                  <td>< ?php echo $so['no_so'] ?></td>
                  <td>< ?php echo $so['nama_customer']?></td>
                  <td>< ?php echo $so['alamat_customer']?></td>
                  <td>< ?php echo $so['status_so']?></td>
                </tr>
                < ?php } ?>
              </tbody>
            </table>
          </div>
        </div> -->

        
        </div>
    </section>
  </div>
</body>