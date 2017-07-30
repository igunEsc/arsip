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
           <a href="<?=base_url()?>admin/produk/tambah_cek" class="btn btn-primary btn-flat">Tambah Data</a>
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="">Nama Produk</th>
                    <th width="">UMKM</th>
                   <th width="20%">Kategori</th>
                   <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
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