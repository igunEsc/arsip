    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">

        <?php
          //notif sukses
          if($this->session->flashdata('sukses')){
              echo '<div class="alert alert-info alert-dismissible">';
              echo $this->session->flashdata('sukses');
              echo '</div>';
          }
        ?>

          <div class="box">
           <a href="<?=base_url()?>admin/user/tambah" class="btn btn-primary btn-flat">Tambah Data</a>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="20%">User Name</th>
                  <th>Nama</th>
                  <th width="15%">Level</th>
                   <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach ($user as $user) { ?>
                <tr>
                  <td><?=$user->username ?></td>
                  <td><?=$user->nama ?></td>
                  <td>
                    <?php if($user->level=='admin'){
                        echo '<span class="badge bg-red">';
                        echo 'Admin</span>';
                      }else{
                        echo '<span class="badge bg-light-blue">';
                        echo 'Operator</span>';
                      }
                    ?>
                  </td>
                  <td>
                    <a href="<?php echo base_url('admin/user/edit/'.$user->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <?php include ('del.php'); ?>
                  </td>
                </tr>
                <?php  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->