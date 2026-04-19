<div class="modal fade" id="toroModal" tabindex="-1" role="dialog" aria-labelledby="toroModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form id="toroForm" method="post" action="<?= base_url('cash_masuk/deleted') ?>">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Otorisasi Pembatalan</h3>
			</div>
			<div class="modal-body" id="toroModalBody">
				<div class="row">
					<div class="form-group">
						<label for="keterangan" class="col-sm-3 control-label">Alasan Pembatalan</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-fw fa-file-text"></i></div>
								<input type="text" class="form-control" required id="keterangan" name="keterangan" placeholder="Alasan Pembatalan">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="tanggal_buat" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-fw fa-lock"></i></div>
								<input type="password" class="form-control" required id="password" name="password" placeholder="Password Anda">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit"><i class="fa fa-hdd-o"></i> Otorisasi</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
			</form>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#toroModal").on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var recipient = button.data('pp');
		var modal = $(this);
		$("#toroForm").attr("action", "<?= base_url('cash_masuk/deleted') ?>/" + recipient);
	});
});
</script>