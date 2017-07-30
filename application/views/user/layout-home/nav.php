 <body>

        <!-- PRELOADER ( DO NOT DELETE, OTHERWISE, PRELOADER WON'T WORK. ) -->
        <div class="preloader"><div></div></div>
        <!-- -->


        <!-- TRANSPARENT WHITE NAV BAR -->
        <nav class="navbar sticky transparent-white">
            <div class="container fluid-container hidden-md">
                <div class="row">
                    <div class="col-md-5">
                        <ul class="ul-h nav-menu nav-menu-left">
                            <li><a href="#hero" class="btn-scroll">Home</a></li>
                            <li><a href="#services-anchor" class="btn-scroll">Produk</a></li>
                            <li><a href="#portfolio-anchor" class="btn-scroll">Galeri</a></li>
                            <li><a href="#berita-anchor" class="btn-scroll">Berita</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <div class="hero-logo">
                            <div class="logo-img">
                               <!--  <img src="<?=base_url()?>assets/user/img/assets/lodsgo.png" class="logo-white" alt="#">
                                <img src="<?=base_url()?>assets/user/img/assets/logo-dark.png" class="logo-black" alt="#"> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <ul class="ul-h nav-menu nav-social nav-social-right">
                        <?php
                                if($this->session->userdata('username') == '' && 
                                $this->session->userdata('akses_level')=='') {
                         ?>
                        <li><a href="<?=base_url()?>login/cek" target="_blank"><i class="icon_lock"></i>Masuk</a></li>
                        <?php } elseif($this->session->userdata('username') != '' ){ ?>
                        <li><a href="#">Halo, <?=$this->session->userdata('nama');?></a><a href="<?=base_url()?>admin/umkm" target="_blank"> | Masuk </a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Collapsed Navigation Bar -->
            <nav class="navbar navbar-collaps">
                <div class="container fluid-container">
                    <div class="collapsed-hero-logo">
                        <div class="logo-img">
                          <!--   <img src="<?=base_url()?>assets/user/img/assets/logo-sddark.png" alt="#"> -->
                        </div>
                    </div>
                    <div class="hamburger-menu">
                        <button type="button" class="hamburger-btn clicked">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                    </div>
                </div>
                <!-- Collapsed Dropdown -->
                <div class="collapsed-dropdown">
                    <ul class="ul-v">
                        <li><a href="#hero" class="btn-scroll">Home</a></li>
                        <li><a href="#services-anchor" class="btn-scroll">Produk</a></li>
                        <li><a href="#portfolio-anchor" class="btn-scroll">Galeri</a></li>
                        <li><a href="#berita-anchor" class="btn-scroll">Berita</a></li>
                        <li><a href="<?=base_url()?>login" target="_blank"><i class="icon_lock"></i>Masuk</a></li>
                    </ul>
                </div>
                <!-- -->
            </nav>
            <!-- -->
        </nav>
        <!-- -->