<!-- Main content -->
    <section class="content">
      <div class="row">
<?php
    echo form_open('admin/berita/tambah',array('id'=>'formadd', 'enctype'=>'multipart/form-data')); 
?>
  <?=validation_errors();?>

      <div class="col-md-8">
          <div class="form-group form-group-lg">
              <label>Judul</label>
              <input type="text" name="judul" class="form-control" placeholder="Judul Berita" value=""  required/>
          </div>
      </div>

      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>Kategori  <sub><a href="<?=base_url()?>admin/katberita/tambah" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a></sub></label>
              <select class="form-control select2" name="id_kat" data-placeholder="Select a State" style="width: 100%;">
                          <?php foreach ($kat as $kat) { ?>
                          <option value="<?=$kat->id ?>">
                          <?=$kat->nama ?> 
                          </option>
                        <?php } ?>
                        </select>
          </div>
      </div>


      <div class="col-md-4">
          <div class="form-group form-group-lg">
              <label>Gambar</label>
              <input type="file" name="foto" class="form-control" required>
          </div>
      </div>


            
      <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Isi
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
              <form>
                <textarea class="textarea1" id="isi" name="isi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
              </form>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Publish</button>
              </div>
              <!-- /.box-footer -->
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


