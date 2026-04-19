
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
						<div class="col-sm-2 text-right"><strong>Cabang</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_cabang','id',$detil[0]['id_m_cabang'],'nama'); ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Supplier</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('supplier','id',$detil[0]['id_supplier'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Inv No</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['inv_no']; ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Date</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['tanggal']; ?>
						</div>
					</div>
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
					Detils
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Item</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Discount</th>
								<th>Tax</th>
								<th>Sub</th>
							</tr>
						</thead>
							<?php if (isset($pos_beli_terima_detils)) : ?>
							<?php if (is_array($pos_beli_terima_detils)) : $i = 0; ?>
							<?php foreach ($pos_beli_terima_detils as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('barang','id',$value['id_barang'],'nama') ?></td>
								<td><?= $value['jumlah'] ?></td>
								<td><?= $value['harga'] ?></td>
								<td><?= $value['discount'] ?></td>
								<td><?= $value['tax'] ?></td>
								<td><?= $value['sub'] ?></td>
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