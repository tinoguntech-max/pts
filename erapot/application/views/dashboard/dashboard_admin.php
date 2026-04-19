<!-- page head start-->
            <div class="page-head">
                <h3>
                    Dashboard
                </h3>
                <span class="sub-title">
					Welcome to dashboard
				</span>
            </div>
          
            <!--body wrapper start-->
            <div class="wrapper">
          		<!--state overview start-->
                


            </div>
            <!--body wrapper end-->
			<script>

$('.convert-data-table').DataTable({
		"PaginationType": "bootstrap",
		dom: 'Bfrtip',
		colReorder: true,
		keys: true,
		fixedHeader: true,
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
					columns: [ ':visible' ]
				}
			},{
				extend: 'csvHtml5',
				exportOptions: {
					columns: [ ':visible' ]
				}
			},{
				extend: 'excelHtml5',
				exportOptions: {
					columns: [ ':visible' ]
				}
			},{
				extend: 'pdfHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				exportOptions: {
					columns: [ ':visible' ]
				}
			},{
				extend: 'print',
				exportOptions: {
					columns: [ ':visible' ]
				}
			}, 'colvis'
		]
	});
</script>