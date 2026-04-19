<script>
		var startDate;
		var endDate;
		
		function validateForm() {
			$( "#btn-submit" ).prop( "disabled", true );
			$( "#btn-submit" ).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
			var check = true;
			var error = '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>ERROR!</strong><br />';
			// check apakah tanggal sudah terisi
			if ($("#m_cabang").val()=='') {
				check = false;
				error += 'Anda harus memilih cabang<br/>';
			}
			error += '</div>';
			if (check == false) {
				$("#error-area").html(error);
				$( "#btn-submit" ).html('Buat Laporan');
				$( "#btn-submit" ).prop( "disabled", false );
			}
			else generate_laporan();
		}
		
		function generate_laporan() {
				$.get("<?php echo base_url("laporan_stock"); ?>/laporan_stock_opname_ajax/"+$('#m_cabang').val(), function(data) {
					$("#toro-area").html(data);
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
					$( "#btn-submit" ).html('Buat Laporan');
					$( "#btn-submit" ).prop( "disabled", false );
				});
		}

		$(function() {
			var start = moment().subtract(29, 'days');
			var end = moment();

			function cb(start, end)
			{
				$('#tgl1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				startDate = start;
				endDate = end;
			}
			
			$('#tgl1').daterangepicker({
				startDate: start,
				endDate: end,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				}
			}, cb);
			cb(start, end);
		});
		
		$(document).ready(function() {
			$('#m_cabang').multiselect({
				enableFiltering: true,
				includeSelectAllOption: false,
				enableCaseInsensitiveFiltering: true,
			});
			$('#barang').multiselect({
				enableFiltering: true,
				includeSelectAllOption: false,
				enableCaseInsensitiveFiltering: true,
			});
		});
	</script>