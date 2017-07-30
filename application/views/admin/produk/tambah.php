<?php if ($umkm ==''){
    redirect(base_url('admin/error'));

}?>  

<!-- Main content -->
    <section class="content">
      <div class="row">
<?php
    echo form_open('admin/produk/tambah/'.$umkm->kode_unik,array('id'=>'formadd', 'enctype'=>'multipart/form-data')); 
?>
  
  <div class="col-md-12">
  <?php if(validation_errors()){
    echo '<div class="alert alert-info alert-dismissible">';
    echo validation_errors();
    echo '</div>';
  }
  ?>
  <?php
          //notif sukses
          if($this->session->flashdata('sukses')){
              echo '<div class="alert alert-info alert-dismissible">';
              echo $this->session->flashdata('sukses');
              echo 'Silahkan tambahkan produk UMKM anda.';
              echo '</div>';
          }
        ?>
    </div>
      <div class="col-md-6">
          <div class="form-group form-group-lg">
              <label>Nama UMKM</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama UMKM" value="<?=$umkm->nama?>"  required disabled/>   
              <input type="hidden" name="id_umkm" class="form-control" placeholder="Nama UMKM" value="<?=$umkm->id?>"/>         
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
         <label></label>
              <p><a href="<?=base_url()?>admin/produk/pilihumkm" class="btn btn-primary btn-lg">Ganti UMKM</a></p>
          </div>
      </div>

      <div class="clearfix"></div>


      <div class="col-md-6">
          <div class="form-group form-group-lg">
              <label>Nama Produk</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Produk" value=""  required/>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group form-group-lg">
              <label>Kategori Produk <sub><a href="<?=base_url()?>admin/katproduk/tambah" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a></sub></label>
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
              <label>Foto</label>
              <input type="file" name="foto" class="form-control" placeholder="Telp UMKM" value="" required />
          </div>
      </div>

      <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Keterangan Produk
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea class="textarea1" id="isi" name="isi" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
            </div>
              <!-- /.box-footer -->
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

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Produk UKM "<?=$umkm->nama?>"</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
           <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Produk UMKM</th>
                       <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($produk as $produk) { ?>
                    <tr>
                      <td width="5%"><?=$i;?></td>
                      <td><?=$produk->nama;?></td>
                      <td>
                        
                        <?php  // include ('del.php'); ?>
                      </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            <!-- /.box -->
          </div>
        <!-- /.col -->
      </div>            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->



