<?php if ($produk ==''){
    redirect(base_url('home/error'));

}?>  
        <!-- BLOG -->
        <section class="bg-white">
            <div class="container pt110 pb110">
                <div class="row">
                 <?php foreach ($produk as $row) { ?>  
                    <!-- Blog Post -->
                    <div class="col-md-4 text-center">
                        <div class="blog-post">
                            <div class="blog-post-preview">
                                <a href="<?=base_url()?>home/produk_det/<?=$row->id; ?>">
                                    <img src="<?=base_url()?>assets/upload/imgproduk/blog/<?=$row->foto; ?>" alt="#">
                                </a>
                            </div>
                            <div class="blog-post-description">
                                <div class="blog-post-category">
                                 <span class="subheading dark"><?=$row->kategori; ?></span>
                                </div>
                                <div class="blog-post-title">
                                    <a href="<?=base_url()?>home/produk_det/<?=$row->id; ?>">
                                        <h3 class="h3-lg"><?php echo ucwords($row->nama); ?></h3>
                                    </a>
                                </div>
                                <p><?php echo word_limiter($row->ket, 35); ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <?php 
                        }
                     ?>
                    
                </div>
                <div class="blog-pagination text-center">
                    <?php 
                    echo $this->pagination->create_links();
                    ?>
                </div>
            </div>
        </section>
        <!-- -->