<div class="modal fade" id="toroModal" tabindex="-1" role="dialog" aria-labelledby="toroModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Surat Pembayaran</h3>
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
				<h3 class="modal-title" id="myModalLabel">Keterangan Panggilan</h3>
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
			if ($("#tgl1").val()=='') {
				check = false;
				error += 'Anda harus mengisi tanggal pembuatan laporan<br/>';
			}
			// check selected
			var brands = $('#barang option:selected');
			var selected = [];
			if (brands.length > 8) {
				check = false;
				error += 'Anda hanya bisa memilih maksimal 8 barang<br/>';
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
			if (check == false) $("#error-area").html(error);
			else generate_laporan();
		}
		
		function generate_laporan() {
				var brands = $('#customer option:selected');
				var selected = [];
				if (brands.length <= 8 && brands.length > 0) {
					$(brands).each(function(index, brand){
						selected.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected.push(["0"]);
				}
				
				var brands1 = $('#cabang option:selected');
				var selected1 = [];
				if (brands1.length <= 8 && brands1.length > 0) {
					$(brands1).each(function(index, brand1){
						selected1.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected1.push(["0"]);
				}
				
				var brands2 = $('#status option:selected');
				var selected2 = [];
				if (brands2.length <= 8 && brands2.length > 0) {
					$(brands2).each(function(index, brand2){
						selected2.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected2.push(["0"]);
				}
				
				var brands3 = $('#durasi option:selected');
				var selected3 = [];
				if (brands3.length <= 8 && brands3.length > 0) {
					$(brands3).each(function(index, brand3){
						selected3.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected3.push(["0"]);
				}
				
				var brands4 = $('#lingkup option:selected');
				var selected4 = [];
				if (brands4.length <= 8 && brands4.length > 0) {
					$(brands4).each(function(index, brand4){
						selected4.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected4.push(["0"]);
				}
				
				$.get("<?php echo base_url("laporan_crm"); ?>/laporan_call_log_ajax/"+moment(startDate).format('YYYY-MM-DD')+
					"/"+moment(endDate).format('YYYY-MM-DD')+"/"+encodeURIComponent(selected)+"/"+encodeURIComponent(selected1)+
					"/"+encodeURIComponent(selected2)+"/"+encodeURIComponent(selected3)+"/"+encodeURIComponent(selected4), function(data) {
					$("#toro-area").html(data);
					$('.convert-data-table').DataTable({
						"PaginationType": "bootstrap",
						dom: '<"tbl-head clearfix"T>,<"tbl-top clearfix"lfr>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>',
						tableTools: {
							"sSwfPath": "<?= base_url() ?>/swf/copy_csv_xls_pdf.swf"
						}
					});
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
			
			$('#cabang').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
			});
			
			$('#customer').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
			});
			
			$('#status').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
			});
			
			$('#durasi').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
			});
			
			$('#lingkup').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
			});
			
			
			$("#toroModal").on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var recipient = button.data('pp');
				var modal = $(this);
				$.ajax({
					url: "<?php echo base_url("beli_minta"); ?>/ajax_detil",
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
		});
	</script>