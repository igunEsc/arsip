 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $umkm->id ?>">
<i class="fa fa-trash-o" title="Delete Arsip"></i>
</button>

<!-- Modal -->
<div class="modal modal-danger fade" id="myModal<?php echo $umkm->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Arsip?</h4>
      </div>
      <div class="modal-body">
        Menghapus UMKM juga akan menghapus semua produk dari UMKM <strong>"<?php echo $umkm->nama ?>"</strong> <br>
        Yakin ingin menghapus..?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url('admin/umkm/del/'.$umkm->id) ?>">
        <button type="button" class="btn btn-primary"><i class="fa fa-trash-o" title="Delete Berita"></i> Ya, Hapus</button>
      </div>
    </div>
  </div>
</div>