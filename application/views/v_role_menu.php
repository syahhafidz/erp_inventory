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
            <h3 class="card-title">Role Menu <button style="margin-left:20px;" class="btn btn-sm btn-success" token="<?php echo $_SESSION['token'] ?>" onclick="cu.addUser(this, event)">Tambah User</button></h3>
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
            <select class="form form-control" id="select_user" onchange="rm.selectRoleByUser(this);">
              <option value="" disabled selected>Masukan User</option>
              <?php foreach($get_user as $gu){ ?>
              <option value="<?php echo $gu['nama']?>"><?php echo $gu['nama']?></option>
              <?php } ?>
            </select>
            <br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">Module</th>
                  <th style="text-align:center;">Status</th>
                </tr>
              </thead>
            
              <tbody  id="detail_role">
                <tr>
                  <td colspan="3" style="text-align:center">Tidak Ada Data</td>
                </tr>
              </tbody>
             

            </table>


          </div>
        </div>
        <hr>

        
        </div>
    </section>
  </div>
</body>