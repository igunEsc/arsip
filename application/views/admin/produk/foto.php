 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $produk->id ?>">
<i class="fa fa-view-o" title="Delete Arsip"></i> Lihat Foto
</button>

<!-- Modal -->
<div class="modal modal-primary fade" id="myModal<?php echo $produk->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$produk->nama?></h4>
      </div>
      <div class="modal-body">
         <img src="<?=base_url()?>assets/upload/imgproduk/<?=$produk->foto?>" alt="Photo" width="570px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>