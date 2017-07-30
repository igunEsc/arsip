<!-- Main content -->
    <section class="content">
      <div class="row">
       
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$tag;?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
              echo form_open('admin/produk/pilihumkm',array('id'=>'formadd', 'class'=>'form-horizontal')); //Jangan pake base_url biasa, inisialkan action adalah # dan inisialkan ID Form
            ?>
              <div class="box-body">
              <?=validation_errors();?>
                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">UMKM</label>

                  <div class="col-sm-10">
                    <select class="form-control select2" name="kd_unik" data-placeholder="Select a State" style="width: 100%;">
                          <?php foreach ($umkm as $umkm) { ?>
                          <option value="<?=$umkm->kode_unik ?>">
                          <?=$umkm->nama ?> 
                          </option>
                        <?php } ?>
                        </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Pilih</button>
              </div>
              <!-- /.box-footer -->
            <?php
              echo form_close();
            ?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

