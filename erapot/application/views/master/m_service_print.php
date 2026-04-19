
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
						<div class="col-sm-2 text-right"><strong>ID / Code</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['id']; ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Name</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['nama']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Price</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['harga']; ?>
						</div>
					</div>
					
					<header class="panel-heading">
					Detils
				</header>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Description</strong></div>
						<div class="col-sm-4">
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
					Item
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Item</th>
								<th>Kuantitas</th>
								<th>Keterangan</th>
							</tr>
						</thead>
							<?php if (isset($service_barang)) : ?>
							<?php if (is_array($service_barang)) : $i = 0; ?>
							<?php foreach ($service_barang as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('barang','id',$value['id_barang'],'nama') ?></td>
								<td><?= $value['kuantitas'] ?></td>
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
	
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Grosir
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Member</th>
								<th>Minimum</th>
								<th>Price</th>
							</tr>
						</thead>
							<?php if (isset($service_harga_jual)) : ?>
							<?php if (is_array($service_harga_jual)) : $i = 0; ?>
							<?php foreach ($service_harga_jual as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('m_membership_type','id',$value['id_m_membership_type'],'nama') ?></td>
								<td><?= $value['minimum'] ?></td>
								<td><?= $value['harga'] ?></td>
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