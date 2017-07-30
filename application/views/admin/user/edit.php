<?php if ($user ==''){
    redirect(base_url('admin/error'));

}?>  
<!-- Main content -->
    <section class="content">
      <div class="row">
       
        <!-- right column -->
        <div class="col-md-7">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$tag;?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
              echo form_open('admin/user/edit/'.$user->id,array('id'=>'formadd', 'class'=>'form-horizontal')); //Jangan pake base_url biasa, inisialkan action adalah # dan inisialkan ID Form
            ?>
              <div class="box-body">
              <?=validation_errors();?>
                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="" placeholder="Ketik Disini" required value="<?=$user->username?>" disabled>
                    <input type="hidden" class="form-control" name="usernames" id="" placeholder="Ketik Disini" required value="<?=$user->username?>" disabled>

                  </div>
                </div>

                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="" placeholder="Ketik Disini" required value="<?=$user->nama?>">
                  </div>
                </div>

                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="" placeholder="Minimal 8 Karakter"  minlength="8">
                  </div>
                </div>

                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label"></label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="passconf" id="" placeholder="Ulangi Password" >
                  </div>
                </div>

                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">Level</label>

                  <div class="col-sm-10">
                    <select class="form-control select2" name="level" data-placeholder="Select a State" style="width: 100%;">
                          <option value="admin" <?php if($user->level=='admin'){echo "Selected";}?>>Admin</option>
                          <option value="operator" <?php if($user->level=='operator'){echo "Selected";}?>>Operator</option>
                        </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
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

