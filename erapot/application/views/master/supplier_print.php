
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal">
<input type="hidden" class="form-control" name="primary" data-bind="value: primary" />
<div id="page-wrapper" class="wrapper">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Overview
				</header>
				
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Nama Murid</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['nama']; ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Alamat</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['alamat']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Kota</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('regencies','id',$detil[0]['id_regencies'],'name'); ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Propinsi</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('provinces','id',$detil[0]['id_provinces'],'name'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>No Telp</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['telp']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>NIS</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['nik']; ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Details
				</header>
				
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Email</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['email']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Description</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['keterangan']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Status</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) {if($detil[0]['status'] == 1) echo "Active"; else echo "Not Active";} ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	
	
	
</div>
</form>
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