<link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="<?=base_url()?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
  //  CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea1").wysihtml5();
  });
</script>
