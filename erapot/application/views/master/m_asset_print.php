
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
					<?= $this->lang->line('overview'); ?>
				</header>
				
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Asset Name</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['nama']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Asset Type</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo get_data('m_asset_type','id',$detil[0]['id_m_asset_type'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Branch</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_cabang','id',$detil[0]['id_m_cabang'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Department</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_department','id',$detil[0]['id_m_department'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Date Acquired</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['tanggal']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Purchasing Price</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['besar']; ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Depreciation Year</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_depreciation_year','id',$detil[0]['id_m_depreciation_year'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Supplier</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo get_data('supplier','id',$detil[0]['id_supplier'],'nama'); ?>
						</div>
					</div>
				</div>
				
				<header class="panel-heading">
					<?= $this->lang->line('detil'); ?>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Description</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['keterangan']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Status</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['status']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Salvage Value</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['salvage_value']; ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Reason</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['alasan']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Retire Date</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['tgl_retire']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Retire Description</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['keterangan']; ?>
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
					Maintanace
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Tipe Service</th>
								<th>Nama Suplier</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th>Status</th>
								<th>Ketarangan</th>
							</tr>
						</thead>
							<?php if (isset($asset_service)) : ?>
							<?php if (is_array($asset_service)) : $i = 0; ?>
							<?php foreach ($asset_service as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $value['tipe_servis'] ?></td>
								<td><?= get_data('supplier','id',$value['id_supplier'],'nama') ?></td>
								<td><?= $value['tgl_mulai'] ?></td>
								<td><?= $value['tgl_selesai'] ?></td>
								<td><?= $value['status'] ?></td>
								<td><?= $value['keterangan'] ?></td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>
							<?php endif; ?>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>
	
</div>
</form>