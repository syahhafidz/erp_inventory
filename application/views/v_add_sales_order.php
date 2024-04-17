<div style="display: flex; flex-direction:row; ">
  <label for="" style="width: 300px">No. Sales Order</label>
  <input type="text" id="nomorso" class="form form-control" value="<?php echo $generare_nomor_so ?>" disabled/>
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
  <select class="form form-control" name="" id="barang">
    <option  disabled selected>-- Pilih Barang --</option>
    <?php foreach($barang as $br){ ?>
      <option value="<?php echo $br['Id']?>"><?php echo $br['nama_barang'] ?></option>
    <?php } ?>
  </select>
</div>