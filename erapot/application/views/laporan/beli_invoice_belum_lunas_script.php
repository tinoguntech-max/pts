<script>

$(function() {
	$('.convert-data-table').DataTable({
	"PaginationType": "bootstrap",
	dom: '<"tbl-head clearfix"T>,<"tbl-top clearfix"lfr>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>',
	tableTools: {
	"sSwfPath": "<?= base_url() ?>/swf/copy_csv_xls_pdf.swf"
	}
	});
});

</script>