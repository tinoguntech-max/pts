
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
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['id']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Nama</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['nama']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Tipe Pembayaran</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)){ 
								if($detil[0]['tipe_barang'] == 1) 
									echo "Monthly";
								else
									echo "Annual"; 								
							}?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Harga Standar</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo 'Rp '.number_format($detil[0]['harga'],0) ?>
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
					List Cabang
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Cabang</th>
								<th>Harga</th>
							</tr>
						</thead>
							<?php if (isset($barang_kit)) : ?>
							<?php if (is_array($barang_kit)) : $i = 0; ?>
							<?php foreach ($barang_kit as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('m_kelas', 'id', $value['id_m_cabang'], 'nama') ?></td>
								<td> Rp <?= number_format($value['harga'],0) ?></td>
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