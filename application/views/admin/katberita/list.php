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
           <a href="<?=base_url()?>admin/katberita/tambah" class="btn btn-primary btn-flat">Tambah Data</a>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Kategori Berita</th>
                   <th width="15%"></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach ($katberita as $katberita) { ?>
                <tr>
                  <td><?=$i;?></td>
                  <td><?=$katberita->nama ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/katberita/edit/'.$katberita->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <?php include ('del.php'); ?>
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
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->