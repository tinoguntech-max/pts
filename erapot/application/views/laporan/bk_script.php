<div class="modal fade" id="toroModal" tabindex="-1" role="dialog" aria-labelledby="toroModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Surat Invoice</h3>
				<?= CLIENT_NAME ?><br/>
				<?= CLIENT_ADDRESS ?>
			</div>
			<div class="modal-body" id="toroModalBody">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

	<script>
		var startDate;
		var endDate;
		var startDate1;
		var endDate1;
		
		function validateForm() {
			var check = true;
			var error = '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>ERROR!</strong><br />';
			// check apakah tanggal sudah terisi
			
			
			error += '</div>';
			if (check == false) {
				$("#error-area").html(error);
				$( "#btn-submit" ).html('Buat Laporan');
				$( "#btn-submit" ).prop( "disabled", false );
			}
			else generate_laporan();
		}
		
		function generate_laporan() {
				
				
				var brands1 = $('#kelas option:selected');
				var selected1 = [];
				if (brands1.length <= 8 && brands1.length > 0) {
					$(brands1).each(function(index, brand){
						selected1.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected1.push(["0"]);
				}
								

				$.get("<?php echo base_url("laporan"); ?>/laporan_bk_ajax/"+moment(startDate).format('YYYY-MM-DD')+"/"+moment(endDate).format('YYYY-MM-DD')
				+"/"+encodeURIComponent(selected1), function(data) {
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
								orientation: 'potrait',
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
			/*$("#tgl1").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});
			$("#tgl2").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});*/
			
			var start = moment().subtract(29, 'days');
			var end = moment();
			var start1 = moment();
			var end1 = moment();

			function cb(start, end)
			 {
				$('#tgl1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				startDate = start;
				endDate = end;
			}

			// function cb1(start, end)
			//  {
			// 	$('#tgl3 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			// 	startDate1 = start;
			// 	endDate1 = end;
			// }

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

			// $('#tgl3').daterangepicker({
			// 	autoUpdateInput: false,
			// 	locale: {
			// 		cancelLabel: 'Clear'
			// 	}
			// }, cb1);
			// $('#tgl3').on('apply.daterangepicker', function(ev, picker) {
			// 	$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			// });
			// $('#tgl3').on('cancel.daterangepicker', function(ev, picker) {
			// 	$(this).val('');
			// });
		});
		
		$(document).ready(function() {
			$('#kelas').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			$('#mapel').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			
			// });
		});
	</script>

