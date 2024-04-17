<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">No. Purchase Order</label>
  <input type="text" id="nomorpo" class="form form-control" value="<?php echo $generare_nomor_po ?>" disabled/>
</div>
<br>
<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">Sales Order</label>
  <select class="form form-control" name="" id="select_so" onchange="po.getAllDataSo(this, event)">
    <option  disabled selected>-- Pilih Sales Order --</option>
    <?php foreach($sales_order as $so){ ?>
      <?php if ($so['status_so'] == 'APPROVE') { ?>
        <option id_barang="<?php echo $so['id_barang']?>" barang="<?php echo $so['nama_barang']?>" alamat="<?php echo $so['alamat_customer']?>" customer="<?php echo $so['nama_customer']?>" value="<?php echo $so['Id']?>"><?php echo $so['nama_customer'] . ' - ' . $so['no_so'] ?></option>
      <?php } ?>
    <?php } ?>
  </select>
</div>
<br>
<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">Nama Customer</label>
  <input type="text" id="customer" class="form form-control" />
</div>
<br>
<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">Alamat Customer</label>
  <textarea type="text" id="alamat" class="form form-control"></textarea>
</div>
<br>
<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">Barang</label>
  <select class="form form-control barang" name="" id="barang">
    <option  disabled selected>-- Pilih Barang --</option>
    <?php foreach($barang as $br){ ?>
      <option value="<?php echo $br['Id']?>"><?php echo $br['nama_barang'] ?></option>
    <?php } ?>
  </select>
</div>
<br>
<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">Qty Barang</label>
  <input type="text" id="qty" class="form form-control"></input>
</div>

