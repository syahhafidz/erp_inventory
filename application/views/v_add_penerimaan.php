<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">No. Penerimaan</label>
  <input type="text" id="no_penerimaan" class="form form-control" value="<?php echo $generare_no_penerimaan ?>" disabled/>
</div>
<br>
<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">Sales Order</label>
  <select class="form form-control" name="" id="select_po" onchange="penerimaan.getAllDataPo(this, event)">
    <option  disabled selected>-- Pilih Sales Order --</option>
    <?php foreach($purchase_order_approve as $p){ ?>
      <?php if ($p['status_po'] == 'APPROVE') { ?>
        <option qty="<?php echo $p['qty_barang']?>" id_barang="<?php echo $p['id_barang']?>" barang="<?php echo $p['nama_barang']?>" alamat="<?php echo $p['alamat_customer']?>" customer="<?php echo $p['nama_customer']?>" value="<?php echo $p['Id']?>"><?php echo $p['nama_customer'] . ' - ' . $p['no_po'] ?></option>
      <?php } ?>
    <?php } ?>
  </select>
</div>
<br>
<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">Nama Supplier</label>
  <input type="text" id="customer" class="form form-control" />
</div>
<br>
<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">Alamat Supplier</label>
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

