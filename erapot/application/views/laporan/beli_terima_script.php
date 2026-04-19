<div class="modal fade" id="toroModal" tabindex="-1" role="dialog" aria-labelledby="toroModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Surat Penerimaan Barang</h3>
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

<div class="modal fade" id="toroModal1" tabindex="-1" role="dialog" aria-labelledby="toroModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Surat Order Pembelian</h3>
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

<div class="modal fade" id="toroModal2" tabindex="-1" role="dialog" aria-labelledby="toroModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Surat Invoice Pembelian</h3>
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
			var brands = $('#m_cabang option:selected');
			var selected = [];
			/*if (brands.length == 0) {
				check = false;
				error += 'Anda harus memilih minimal satu cabang<br/>';
			}*/
			if (brands.length > 8) {
				check = false;
				error += 'Anda hanya bisa memilih maksimal 8 barang<br/>';
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
				var brands = $('#m_cabang option:selected');
				var selected = [];
				if (brands.length <= 8 && brands.length > 0) {
					$(brands).each(function(index, brand){
						selected.push(["-o-"+$(this).val()+"-o-"]);
					});
				}
				else {
					selected.push(["0"]);
				}
				var bpb_no = $('#bpb_no').val();
				if (bpb_no == '') bpb_no = '0';
				bpb_no = bpb_no.replace(/\//g,'-o-');
				
				$.post( "<?= base_url("laporan_beli/laporan_beli_terima_ajax") ?>", 
					{ tgl1: moment(startDate).format('YYYY-MM-DD'), tgl2: moment(endDate).format('YYYY-MM-DD'),
						cabang: encodeURIComponent(selected), bpb_no: encodeURIComponent(bpb_no) })
				.done(function( data ) {
					$("#toro-area").html(data.report);
					$("#n_record").html(data.n_record);
					$("#n_detail_record").html(data.n_detail_record);
					$("#n_item").html(data.n_item);
					$("#n_order").html(data.n_order);
					$('.convert-data-table').DataTable({
						"PaginationType": "bootstrap",
						dom: 'Bfrtip',
						colReorder: true,
						keys: true,
						fixedHeader: true,
						//scrollX: true,
						fixedColumns: {
							leftColumns: 3
						},
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
					$( "#row-executive" ).show();
					$( "#row-report" ).show();
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

			function cb(start, end) {
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
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			
			$("#toroModal").on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var recipient = button.data('pp');
				var modal = $(this);
				$.ajax({
					url: "<?php echo base_url("beli_terima"); ?>/ajax_detil",
					data: {
						q: recipient
					},
					success: function( data ) {
						modal.find('.modal-body').html(data);
						//$('#toroModalBody').html(data);
					}
				});
			});
			
			$("#toroModal1").on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var recipient = button.data('pp');
				var modal = $(this);
				$.ajax({
					url: "<?php echo base_url("beli_order"); ?>/ajax_detil",
					data: {
						q: recipient
					},
					success: function( data ) {
						modal.find('.modal-body').html(data);
						//$('#toroModalBody').html(data);
					}
				});
			});

			$("#toroModal2").on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var recipient = button.data('pp');
				var modal = $(this);
				$.ajax({
					url: "<?php echo base_url("beli_invoice"); ?>/ajax_detil",
					data: {
						q: recipient
					},
					success: function( data ) {
						modal.find('.modal-body').html(data);
						//$('#toroModalBody').html(data);
					}
				});
			});
		});
	</script>