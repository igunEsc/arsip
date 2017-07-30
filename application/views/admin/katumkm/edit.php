<?php if ($katumkm ==''){
    redirect(base_url('admin/error'));

}?>  
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
              echo form_open('admin/katumkm/edit/'.$katumkm->id,array('id'=>'formadd', 'class'=>'form-horizontal')); //Jangan pake base_url biasa, inisialkan action adalah # dan inisialkan ID Form
            ?>
              <div class="box-body">
              <?=validation_errors();?>
                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Ketik Disini" required value="<?=$katumkm->nama; ?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
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

