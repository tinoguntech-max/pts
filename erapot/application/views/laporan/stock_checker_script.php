<!-- Upload dialog -->
<div class="modal fade" id="toroUploadFoto" tabindex="-1" role="dialog" aria-labelledby="toroModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="toroUploadLabel">Upload Excel</h3>
			</div>
			<div class="modal-body" id="toroUploadFotoBody">
				<form id="toroUploaderFoto" method="post" class="dropzone">
					<div class="fallback">
						<input name="file" type="file" multiple />
					</div>
				</form>
			</div>
			<div class="modal-footer">
					<button class="btn btn-primary" onclick="location.reload()"><i class="fa fa-refresh"></i> Refresh</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<input type="hidden" value="" id="userID" name="userID">
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="toroModal" tabindex="-1" role="dialog" aria-labelledby="toroModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Surat Delivery</h3>
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
		$(document).ready(function() {
			$('#m_cabang').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			$('#status').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
		
			$(document).ready(function(){
				Dropzone.autoDiscover = false;
				var myDropzone = new Dropzone("#toroUploaderFoto", { 
					url: "<?php echo base_url("stock_checker"); ?>/uploads/",
					maxFilesize: 15,
					uploadMultiple: false,
					acceptedFiles: ".xls,.xlsx"
				});
				myDropzone.on("success", function(file, response) {
					var dataupdate = response.perluDiUpdate;
					var cabang = response.cabang;
					$('#toro-area').html(response.report);
					$("#n_record").html(response.n_record);
					$("#n_record_fail").html(response.n_record_fail);
					$("#n_record_notfound").html(response.n_record_notfound);
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
					$( "#btn-submit" ).html('Upload');
					$( "#btn-submit" ).prop( "disabled", false );
					$('#toroUploadFoto').modal('hide');
					
					$('#submit-jurnal').click(function(){
						$.post( "<?= base_url("jurnal_sesuai/add_batch") ?>", { datas: dataupdate, cabangs : cabang }).done(function( data ) {	
									
						});					
					});	
				
				});
			});
			$("#toroModal").on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var recipient = button.data('pp');
				var modal = $(this);
				$.ajax({
					url: "<?php echo base_url("pos_jual_delivery"); ?>/ajax_detil",
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

