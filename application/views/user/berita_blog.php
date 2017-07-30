<?php if ($berita ==''){
    redirect(base_url('home/error'));

}?>  
        <!-- BLOG POST -->
        <section class="bg-white">
            <div class="container pt110 pb110">
                <div class="row">

                    <!-- Blog Post -->
                    <div class="col-md-8">
                        <div class="blog-post-single">
                            <div class="blog-post-description">
                                <!-- <div class="blog-post-category">
                                    <span>in <a href="#"><span class="subheading dark">Lifestyle</span></a></span>
                                </div> -->
                                <div class="blog-post-title">
                                    <h3 class="h3-lg"><?=ucwords($berita->judul)?></h3>
                                </div>
                            </div>
                            <div class="blog-post-preview">
                                <img src="<?=base_url()?>assets/upload/imgberita/blog/<?=$berita->foto?>" alt="#">
                            </div>
                            <div class="blog-post-text">
                                <?=$berita->isi?>
                            </div>
                          
                            
                        </div>
                    </div>
                    <!-- -->

                    <!-- Blog Post Sidebar -->
                    <div class="col-md-4">
                        <div class="blog-post-sidebar">
                    
                            <!-- RECENT POSTS -->
                            <div class="widget-box recent-posts">
                                <div class="widget-title">
                                    <h5 class="subheading dark">Berita Terbaru</h5>
                                </div>
                                <?php foreach ($berita_2 as $berita_2) { ?>
                            
                                <!-- Recent Post -->
                                <div class="recent-post">
                                    <a href="#">
                                        <h3 class="h3-md"><?=ucwords($berita_2->judul)?></h3>
                                        <div class="recent-post-preview">
                                            <img src="<?=base_url()?>assets/upload/imgberita/blog/<?=$berita_2->foto?>" alt="#">
                                        </div>
                                        <div class="recent-post-date">
                                            <?=$berita_2->kategori?>
                                        </div>
                                    </a>
                                </div>
                                <!-- -->
                                <?php } ?>
                                
                                <!-- Show All -->
                                <a href="<?=base_url()?>home/berita"><h5 class="subheading dark mt40">Berita Selengkapnya</h5></a>
                                <!-- -->

                            </div>
                            <!-- -->

                        </div>
                    </div>
                    <!-- -->
                </div>
            </div>
        </section>
        <!-- -->


