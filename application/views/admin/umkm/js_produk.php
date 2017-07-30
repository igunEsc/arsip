<script src="<?=base_url()?>assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/extensions/Buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/extensions/Buttons/js/buttons.flash.min.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/extensions/Buttons/js/jszip.min.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/extensions/Buttons/js/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/extensions/Buttons/js/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/extensions/Buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/plugin/datatables/extensions/Buttons/js/buttons.print.min.js"></script>
<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {
    //datatables

    var oTable = $('#table').dataTable({
            "bProcessing": true,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "bServerSide": true,
            "responsive": true,
            "sAjaxSource": '<?=base_url();?>admin/umkm/viewproduk/<?=$s4;?>',
            "bJQueryUI": false,
            "dom": 'Bfrtip',
            "iDisplayStart ": 30,
            "buttons": ['pageLength'],
            "aoColumns": [{
                 "mData": "nama"
             }, {
                "mData": "kategoriproduk"
             }, {
                 "mData": "action"
             }],
            "order": [[ 0, 'asc' ]],
            "oLanguage": {
                "sProcessing": '<i class="fa fa-spinner fa-pulse fa-3x"></i>'
            },
            "fnInitComplete": function () {
                oTable.fnAdjustColumnSizing();
            },
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax
                ({
                    'dataType': 'json',
                    'type': 'GET',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
            }
        });

        
    });
</script>
