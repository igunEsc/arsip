
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li class="treeview <?php if($menu=='umkm'){echo "active";}?>">
          <a href="#">
            <i class="fa fa-folder-open-o"></i> <span>UKM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>admin/umkm"><i class="fa fa-circle-o"></i>Semua UKM</a></li>
            <li><a href="<?=base_url()?>admin/umkm/tambah"><i class="fa fa-circle-o"></i>Tambah UKM</a></li>
            <li><a href="<?=base_url()?>admin/katumkm"><i class="fa fa-circle-o"></i>Kategori UMKM</a></li>
          </ul>
        </li>

        <li class="treeview <?php if($menu=='produk'){echo "active";}?>">
          <a href="#">
            <i class="fa fa-folder-open-o"></i> <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>admin/produk"><i class="fa fa-circle-o"></i>Semua Produk</a></li>
            <li><a href="<?=base_url()?>admin/produk/tambah_cek"><i class="fa fa-circle-o"></i>Tambah Produk</a></li>
            <li><a href="<?=base_url()?>admin/katproduk"><i class="fa fa-circle-o"></i>Kategori Produk</a></li>
          </ul>
        </li>

        <li class="treeview <?php if($menu=='berita'){echo "active";}?>">
          <a href="#">
            <i class="fa fa-folder-open-o"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>admin/berita"><i class="fa fa-circle-o"></i>Semua Berita</a></li>
            <li><a href="<?=base_url()?>admin/berita/tambah"><i class="fa fa-circle-o"></i>Tambah Berita</a></li>
            <li><a href="<?=base_url()?>admin/katberita"><i class="fa fa-circle-o"></i>Kategori Berita</a></li>
          </ul>
        </li>

        <?php if($this->session->userdata('level')=='admin') { ?>
        <li class="header">AKSES</li>
        <li><a href="<?=base_url()?>admin/user"><i class="fa fa-circle-o text-red"></i> <span>Manajemen User</span></a></li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title;?>
        <small><?=$tag;?></small>
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>