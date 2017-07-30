<!-- Main content -->
    <section class="content">
      <div class="row">
<?php
    echo form_open('admin/umkm/tambah',array('id'=>'formadd', 'enctype'=>'multipart/form-data')); 
?>
  

      <div class="col-md-6">

          <div class="form-group form-group-lg">
              <label>Nama UMKM</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama UMKM" value=""  required/>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
              <label>Kategori  <sub><a href="<?=base_url()?>admin/katumkm/tambah" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a></sub></label>
              <select class="form-control select2" name="id_kat" data-placeholder="Select a State" style="width: 100%;">
                          <?php foreach ($kat as $kat) { ?>
                          <option value="<?=$kat->id ?>">
                          <?=$kat->nama ?> 
                          </option>
                        <?php } ?>
                        </select>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
              <label>Telepon / HP</label>
              <input type="text" name="telp" class="form-control" placeholder="Telp UMKM" value="" />
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group form-group-lg">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Alamat UMKM" value=""  required/>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
            <label>Kecamatan</label>
            <select class="form-control select2" id="id_kec" name="id_kec" data-placeholder="Select a State" style="width: 100%;">
            <option value='0'>--Pilih--</option>
             <?php foreach ($kec as $kec) { ?>
                          <option value="<?=$kec->id ?>">
                          <?=$kec->name ?> 
                          </option>
                        <?php } ?>
            </select>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
            <label>Kelurahan / Desa</label>
            <select class="form-control select2" id="id_kel" name="id_kel" data-placeholder="Select a State" style="width: 100%;">
              <option value="0">--Pilih--</option>
            </select>
          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>Tanggal Terdaftar</label>
              <input type="text" name="tgl" id="datepicker" class="form-control" placeholder="Klik Tanggal" value=""  required/>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="col-md-6">
          <div class="form-group form-group-lg">
              <label>Nama Pemilik</label>
              <input type="text" name="pemilik" class="form-control" placeholder="Nama Pemilik UMKM" value=""  required/>

          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>NIK</label>
              <input type="text" name="id_ktp" class="form-control" placeholder="NIK Pemilik UMKM" value=""  required/>
          </div>
      </div>

      <div class="col-md-2">
          <div class="form-group form-group-lg">
            <label>Jenis Kelamin</label>
              <div class="radio">
                <label>
                  <input type="radio" name="jk" id="optionsRadios1" value="l" checked>
                  Laki - Laki
                </label>
                <label>
                  <input type="radio" name="jk" id="optionsRadios2" value="p">
                  Perempuan
                </label>
              </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>No. HP</label>
              <input type="text" name="hp" class="form-control" placeholder="HP" value=""  required/>
          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>E-Mail</label>
              <input type="email" name="email" class="form-control" placeholder="Email" value="" />
          </div>
      </div>


      <input type="hidden" name="kd_unik" class="form-control" placeholder="Nama Pemilik UMKM" value="<?php echo random_string('alnum', 16);?>"  required/>

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


