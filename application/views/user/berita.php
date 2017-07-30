 <?php if ($berita ==''){
    redirect(base_url('home/error'));

}?> 
       <!-- BLOG -->
        <section class="bg-white">
            <div class="container pt110 pb110">
                <div class="row">

                    <?php foreach ($berita as $row) { ?>  
                    <!-- Blog Post -->
                    <div class="col-md-4 text-center">
                        <div class="blog-post">
                            <div class="blog-post-preview">
                                <a href="<?=base_url()?>home/berita_det/<?=$row->id; ?>">
                                    <img src="<?=base_url()?>assets/upload/imgberita/blog/<?=$row->foto; ?>" alt="#">
                                </a>
                            </div>
                            <div class="blog-post-description">
                              <div class="blog-post-category">
                                 <span class="subheading dark"><?=$row->kategori; ?></span>
                                </div> 
                                <div class="blog-post-title">
                                    <a href="<?=base_url()?>home/berita_det/<?=$row->id; ?>">
                                        <h3 class="h3-lg"><?=ucwords($row->judul); ?></h3>
                                    </a>
                                </div>
                                <p><?php echo word_limiter($row->isi, 20); ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <?php } ?>
                    
                </div>
                <div class="blog-pagination text-center">
                    <?php 
                    echo $this->pagination->create_links();
                    ?>
                </div>
            </div>
        </section>
        <!-- -->