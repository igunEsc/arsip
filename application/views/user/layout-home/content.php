        <!-- HERO -->
        <section id="hero" class="parallax hero-fullscreen bg-white">
            <div class="background-image">
                <img src="<?=base_url()?>assets/user/img/backgrounds/bg-1.jpg" alt="#">
            </div>
            <div class="hero-content">
                <div class="container pl5p pr5p">
                    <div class="col-md-8 text-center m-auto white">
                        <h5 class="hero-subheading mb15">SITUS RESMI</h5>
                        <h1 class="h1-lg mb10">UMKM</h1>
                        <h5 class="lead h5-md mb20">Usaha Mikro Kecil dan Menengah Kabupaten Kepulauan Mentawai <br>
                        Provinsi Sumatera Barat</h5>
                        <a href="#services-anchor" class="btn btn-hero btn-scroll">Lihat Produk</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- -->




        <!-- ABOUT US -->
        <section class="bg-white">
            <div class="container pt140 pb140">
                <div class="row">
                    <div class="col-md-8 m-auto text-center">
                        <div class="black">
                            <h5 class="subheading mb15">SELAMAT DATANG DI SITUS UMKM KABUPATEN KEPULAUAN MENTAWAI</h5>
                            <h5 class="h5-lg mb15 black">Air yang tak bergerak lebih cepat busuk. Kunci yang tak pernah dibuka lebih mudah serat. Mesin yang tak dinyalakan lebih gampang berkarat. Hanya perkakas yang tak digunakanlah yang disimpan dalam laci berdebu. Alam telah mengajarkan ini; Jangan berhenti berkarya, atau anda segera menjadi tua dan tak berguna. </h5>
                            <p class="hidden-xs inline-block gray"></p><a href="#" class="btn-p-gray ml10 gray">-UMKM Kabupaten Kepulauan Mentawai-</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -->

      

           <!-- Produk -->
        <section id="services-anchor" class="bg-gray">
            <div class="container pt100 pb100">
                <!-- Section Heading -->
                <div class="section-heading mb10 col-md-6 black m-auto">
                    <h5 class="subheading dark mb5">UMKM Kabupaten Kepulauan Mentawai</h5>
                    <h2 class="h2-md">Produk</h2>
                </div>
                <!-- -->
                <div class="owl-carousel owl-theme owlTeam">


                    <?php foreach ($produk as $produk) { ?>    
                    <!-- Team Member -->
                    <div class="team-container-2 black">
                        <div class="team-hover-caption">
                            <div class="team-member-desc">
                                
                                <div class="team-member-position">
                                    <h5 class="subheading dark"><p><?=$produk->nama; ?></p></h5>
                                </div>
                                <div class="team-member-social">
                                    <ul class="ul-h">
                                        <li><a href="<?php echo base_url('home/produk_det/'.$produk->id) ?>">Selengkapnya</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <img src="<?=base_url()?>assets/upload/imgproduk/home/<?=$produk->foto?>" alt="#">
                    </div>
                    <!-- -->
                    <?php } ?>

                </div>

                <div class="col-md-4 services-text-block text-center m-auto mt40">
                    <a href="<?=base_url()?>home/produk" class="btn btn-ghost-black btn-scroll mt15">Selengkapnya</a>
                </div>
            </div>
        </section>
        <!-- -->




        <!-- Galeri -->
        <section id="portfolio-anchor" class="bg-white">
            <div class="portfolio width100 container pt140 pb0">
                <div class="row text-center">
                    <!-- Section Heading -->
                    <div class="section-heading relative black">
                        <h2 class="h2-md">Galeri</h2>
                        <div class="gallery-title-absolute">
                            <h5 class="subheading gray">Produk UKM</h5>
                        </div>
                    </div>
                  
                    <div class="portfolio-grid-fullwidth" data-gap="10"><!-- Values: 10, 15, 20, 25, 30 and 35 -->
                        <!-- Portfolio Items Container-->
                        <div class="portfolio-forester lightbox">


                            <?php foreach ($galeri as $galeri) { ?>
                            <!-- Portfolio Item -->
                            <div class="col-md-4 col-sm-6" data-filter="Design" data-caption-style="1">
                                <!-- LIGHTBOX IMAGE DESTINATION -->
                                <a href="<?=base_url()?>assets/upload/imgproduk/galeri/<?=$galeri->foto?>"">
                                <!-- -->
                                    <div class="portfolio-item">
                                        <div class="item-caption black">
                                            <div class="caption-desc">
                                                <div class="caption-btn">
                                                    <h5 class="subheading dark"><?=$galeri->nama?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- UPDATE IMAGE DESTINATION BELOW -->
                                        <img src="<?=base_url()?>assets/upload/imgproduk/galeri/<?=$galeri->foto?>" alt="#">
                                        <!-- -->
                                    </div>
                                </a>
                            </div>
                            <?php  }  ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -->

            <!-- FEATURES -->
        <section class="bg-white">
            <div class="container pt70 pb70">
                <div class="row">

                   

                </div>
            </div>
        </section>
        <!-- -->



         <!-- Berita -->
        <section id="berita-anchor" class="bg-gray">
            <div class="container pt100 pb100">
                <!-- Section Heading -->
                <div class="section-heading mb10 col-md-6 black m-auto">
                    <h5 class="subheading dark mb5">UKM Kabupaten Kepulauan Mentawai</h5>
                    <h2 class="h2-md">Berita</h2>
                </div>
                <!-- -->
                <div class="owl-carousel owl-theme owlTeam">

                    <!-- Berita Member -->
                    <?php foreach ($berita as $berita) { ?>    
                    <div class="team-container-2 black">
                        <div class="team-hover-caption">
                            <div class="team-member-desc">
                               <!--  <div class="team-member-name">
                                    <h3 class="h3-md">Venus Blake</h3>
                                </div>
                                <div class="team-member-position">
                                    <h5 class="subheading dark">Designer</h5>
                                </div> -->
                                <div class="team-member-body">
                                    <p><strong><?=$berita->judul?></strong></p>
                                </div>
                                <div class="team-member-social">
                                    <ul class="ul-h">
                                        <li><a href="<?php echo base_url('home/berita_det/'.$berita->id) ?>">Selengkapnya</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <img src="<?=base_url()?>assets/upload/imgberita/home/<?=$berita->foto?>" alt="#">
                    </div>
                    <?php  }  ?>
                    <!-- -->

                </div>

                <div class="col-md-4 services-text-block text-center m-auto mt40">
                    <p>Dapatkan berita tentang kegiatan UMKM Kabupaten Kepulauan Mentawai</p>
                    <a href="<?php echo base_url('home/berita') ?>" class="btn btn-ghost-black btn-scroll mt15">Selengkapnya</a>
                </div>
            </div>
        </section>
        <!-- -->




        <!-- Total Produk-->
        <section class="bg-black">
            <div class="container pt70 pb70">
                <div class="row">


                    <!-- Number -->
                    <div class="col-md-3 pl30 pr30">
                    </div>
                    <!-- -->


                    <!-- Number -->
                    <div class="col-md-3 pl30 pr30">
                        <div class="our-numbers-wrap white text-center">
                            <div class="number-counter">
                                <h2 class="h2-lg counter"><?=$t_produk->total?></h2>
                            </div>
                            <div class="number-counter-desc">
                                <div class="number-counter-title">
                                    <h5 class="h5-md">Produk Terdaftar</h5>
                                </div>
                                <p>Kami berpikir bahwa keberhasilan usaha harus selalu didukung oleh produk yang berkualitas </p>
                            </div>
                        </div>
                    </div>
                    <!-- -->

                    <!-- Number -->
                    <div class="col-md-3 pl30 pr30">
                        <div class="our-numbers-wrap white text-center">
                            <div class="number-counter">
                                <h2 class="h2-lg counter"><?=$t_umkm->total?></h2>
                            </div>
                            <div class="number-counter-desc">
                                <div class="number-counter-title">
                                    <h5 class="h5-md">UMKM</h5>
                                </div>
                                <p>Perkembangan Usaha Mikro Kecil dan Menengah sangat pesat di Kabupaten Kepulauan Mentawai</p>
                            </div>
                        </div>
                    </div>
                    <!-- -->

                </div>
            </div>
        </section>
        <!-- -->




        <!-- TESTIMONIALS -->
        <section id="reviews-anchor" class="parallax">
            <div class="background-image overlay-black" data-overlay-dark="4">
                <img src="<?=base_url()?>assets/user/img/backgrounds/bg-1.jpg" alt="#">
            </div>
            <div class="container pt120 pb120">
                <!-- Section Heading -->
                <div class="section-heading col-md-6 white m-auto">
                    <h5 class="subheading mb5">Kata</h5>
                    <h2 class="h2-md">Motivasi</h2>
                </div>
                <!-- -->
                <div class="owl-carousel owl-theme owlTestimonials white">
                    <!-- //////////////////////////////// Testimonial //////////////////////////////// -->
                    <div class="testimonial-wrap">
                        <div class="testimonial-quote">
                            <h5 class="h5-md mt0 mb20"><em>“</em> Menyesali nasib tidak akan mengubah keadaan. Terus berkarya dan bekerjalah yang membuat kita berharga. <em>”</em></h5>
                            <h5 class="subheading">Abdurrahman Wahid</h5>
                        </div>
                    </div>
                    <!-- //////////////////////////////////////////////////////////////// -->

                    <!-- //////////////////////////////// Testimonial //////////////////////////////// -->
                    <div class="testimonial-wrap">
                        <div class="testimonial-quote">
                            <h5 class="h5-md mt0 mb20"><em>“</em> Jadi apanya yang harus dikenal, kan orang dikenal karena karyanya, ratusan juta orang di atas bumi ini tidak berkarya yang membikin mereka dikenal, maka tidak dikenal. <em>”</em></h5>
                            <h5 class="subheading">Pramoedya Ananta Toer</h5>
                        </div>
                    </div>
                    <!-- //////////////////////////////////////////////////////////////// -->

                    <!-- //////////////////////////////// Testimonial //////////////////////////////// -->
                    <div class="testimonial-wrap">
                        <div class="testimonial-quote">
                            <h5 class="h5-md mt0 mb20"><em>“</em>  Saatnya berbuat dan berkarya, susun rencana sekarang juga, mulailah secepatnya <em>”</em></h5>
                            <h5 class="subheading">Najwa Shihab</h5>
                        </div>
                    </div>
                    <!-- //////////////////////////////////////////////////////////////// -->
                </div>
            </div>
        </section>
        <!-- -->




      