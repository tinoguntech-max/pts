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
			$( "#btn-submit" ).prop( "disabled", true );
			$( "#btn-submit" ).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
			var check = true;
			var error = '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>ERROR!</strong><br />';
			// check apakah tanggal sudah terisi
			if ($("#tgl1").val()=='') {
				check = false;
				error += 'Anda harus mengisi tanggal pembuatan laporan<br/>';
			}
			// check selected
			var brands = $('#m_kelas option:selected');
			var selected = [];
			/*if (brands.length == 0) {
				check = false;
				error += 'Anda harus memilih minimal satu cabang<br/>';
			}*/
			if (brands.length > 8) {
				check = false;
				error += 'Anda hanya bisa memilih maksimal 8 cabang<br/>';
			}
			var brands2 = $('#murid option:selected');
			var selected2 = [];
			/*if (brands.length == 0) {
				check = false;
				error += 'Anda harus memilih minimal satu cabang<br/>';
			}*/
			if (brands2.length > 8) {
				check = false;
				error += 'Anda hanya bisa memilih maksimal 8 Murid<br/>';
			}
			var brands1 = $('#status option:selected');
			var selected1 = [];
			/*if (brands.length == 0) {
				check = false;
				error += 'Anda harus memilih minimal satu cabang<br/>';
			}*/
			if (brands1.length > 8) {
				check = false;
				error += 'Anda hanya bisa memilih maksimal 8 Status<br/>';
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
				var brands = $('#m_kelas option:selected');
				var selected = [];
				if (brands.length <= 8 && brands.length > 0) {
					$(brands).each(function(index, brand){
						selected.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected.push(["0"]);
				}
				
				var brands2 = $('#murid option:selected');
				var selected2 = [];
				if (brands2.length <= 8 && brands2.length > 0) {
					$(brands2).each(function(index, brand){
						selected2.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected2.push(["0"]);
				}
	
				var brands1 = $('#tahun option:selected');
				var selected1 = [];
				if (brands1.length <= 8 && brands1.length > 0) {
					$(brands1).each(function(index, brand){
						selected1.push([$(this).val()]);
					});
				}
				else {
					selected1.push(["<?= date('Y')?>"]);
				}

				$.get("<?php echo base_url("laporan_pos"); ?>/laporan_tunggakan_ajax/"+encodeURIComponent(selected1)+"/"+encodeURIComponent(selected)+"/"+encodeURIComponent(selected2), function(data) {
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
			/*$("#tgl1").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});
			$("#tgl2").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});*/
			
			var start = moment().subtract('years');
			var end = moment();
			var start1 = moment();
			var end1 = moment();

			function cb(start, end)
			 {
				$('#tgl1 span').html(start.format('YYYY') + ' - ' + end.format('YYYY'));
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
			$('#m_kelas').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			$('#murid').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			$('#status').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			$('#tahun').multiselect({
				enableFiltering: true,
				enableCaseInsensitiveFiltering: true,
			});
			
			$("#toroModal").on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var recipient = button.data('pp');
				var modal = $(this);
				$.ajax({
					url: "<?php echo base_url("pos_beli_terima_manage"); ?>/ajax_detil",
					data: {
						q: recipient
					},
					success: function( data ) {
						modal.find('.modal-body').html(data);
						//$('#toroModalBody').html(data);
					}
				});
			});
			
			// $("#toroModal1").on('show.bs.modal', function (event) {
			// 	var button = $(event.relatedTarget);
			// 	var recipient = button.data('pp');
			// 	var modal = $(this);
			// 	$.ajax({
			// 		url: "<?php echo base_url("produksi_spk"); ?>/ajax_detil",
			// 		data: {
			// 			q: recipient
			// 		},
			// 		success: function( data ) {
			// 			modal.find('.modal-body').html(data);
			// 			//$('#toroModalBody').html(data);
			// 		}
			// 	});
			// });
		});
	</script>

