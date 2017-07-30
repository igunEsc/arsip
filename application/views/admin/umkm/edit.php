<?php if ($umkm ==''){
    redirect(base_url('admin/error'));

}?>  
<!-- Main content -->
    <section class="content">
      <div class="row">
<?php
    echo form_open('admin/umkm/edit/'.$umkm->id,array('id'=>'formadd', 'enctype'=>'multipart/form-data')); 
?>
  

      <div class="col-md-6">

          <div class="form-group form-group-lg">
              <label>Nama UMKM</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama UMKM" value="<?=$umkm->nama; ?>"  required/>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
              <label>Kategori  <sub><a href="<?=base_url()?>admin/katumkm/tambah" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a></sub></label>
              <select class="form-control select2" name="id_kat" data-placeholder="Select a State" style="width: 100%;">
                          <?php foreach ($kat as $kat) { ?>
                          <option value="<?=$kat->id ?>" <?php if($umkm->id_kat==$kat->id) {echo "selected"; } ?>>
                              <?=$kat->nama ?> 
                          </option>
                        <?php } ?>
                        </select>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
              <label>Telepon / HP</label>
              <input type="text" name="telp" class="form-control" placeholder="Telp UMKM" value="<?=$umkm->telp; ?>" />
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group form-group-lg">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Alamat UMKM" value="<?=$umkm->alamat; ?>"  required/>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
            <label>Kecamatan</label>
            <select class="form-control select2" id="id_kec" name="id_kec" data-placeholder="Select a State" style="width: 100%;">
            <option value='0'>--Pilih--</option>
             <?php foreach ($kec as $kec) { ?>
                          <option value="<?=$kec->id ?>" <?php if($umkm->id_kec==$kec->id) {echo "selected"; } ?>><?=$kec->name ?></option>
                        <?php } ?>
            </select>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
            <label>Kelurahan / Desa</label>
            <select class="form-control select2" id="id_kel" name="id_kel" data-placeholder="Select a State" style="width: 80%;">
              <?php foreach ($kel as $kel) { ?>
                          <option value="<?=$kel->id; ?>" <?php if($umkm->id_kel==$kel->id) {echo "selected"; } ?> >
                          <?=$kel->name ?> 
                          </option>
                        <?php } ?>
            </select>
          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>Tanggal Terdaftar</label>
              <input type="text" name="tgl" id="datepicker" class="form-control" placeholder="Klik Tanggal" 
              value="<?=$umkm->tgl_terdaftar ?>"  required/>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="col-md-6">
          <div class="form-group form-group-lg">
              <label>Nama Pemilik</label>
              <input type="text" name="pemilik" class="form-control" placeholder="Nama Pemilik UMKM" 
              value="<?=$umkm->pemilik ?>"  required/>

          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>NIK</label>
              <input type="text" name="id_ktp" class="form-control" placeholder="NIK Pemilik UMKM" 
              value="<?=$umkm->id_ktp ?>"  required/>
          </div>
      </div>

      <div class="col-md-2">
          <div class="form-group form-group-lg">
            <label>Jenis Kelamin</label>
              <div class="radio">
                <label>
                  <input type="radio" name="jk" id="optionsRadios1" value="l" <?php if($umkm->jk_pemilik=="l") {echo "checked"; } ?>>
                  Laki - Laki
                </label>
                <label>
                  <input type="radio" name="jk" id="optionsRadios2" value="p" <?php if($umkm->jk_pemilik=="p") {echo "checked"; } ?>>
                  Perempuan
                </label>
              </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>No. HP</label>
              <input type="number" name="hp" class="form-control" placeholder="HP" 
              value="<?=$umkm->hp ?>"  required/>
          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>E-Mail</label>
              <input type="email" name="email" class="form-control" placeholder="Email" 
              value="<?=$umkm->email ?>" />
          </div>
      </div>

       <div class="col-md-12">
          <div class="form-group">
              <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
              <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
              <?=validation_errors();?>
          </div>
      </div>

<?php
  echo form_close();
?>   
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


