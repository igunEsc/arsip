 <!-- bootstrap datepicker -->
 <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/datepicker/datepicker3.css">

 <!-- bootstrap datepicker -->
<script src="<?php echo base_url()?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">

$(function(){

$.ajaxSetup({
	type:"POST",
	url: "<?php echo base_url('admin/umkm/ambil_data') ?>",
	cache: false,
});


$("#id_kec").change(function(){ //id unput view
	var value=$(this).val();
	if(value>0){
	$.ajax({
	data:{modul:'kelurahan',id:value}, //nama modul untuk di kirim ke model
	success: function(respond){
	$("#id_kel").html(respond); //id input view
	}
	})
	}
});

//Date picker
$('#datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd'
});


})

</script>