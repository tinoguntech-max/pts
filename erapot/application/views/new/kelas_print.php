
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
						<div class="col-sm-2 text-right"><strong>Nama</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['nama']; ?>
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
					List Siswa
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>								
								<th >No</th>
								<th >Nama</th>
								<th >NIS</th>
								<th >Nilai</th>
							</tr>
						</thead>
						<?php if (isset($detils_siswa)) : ?>
						<?php if (is_array($detils_siswa)) :  $i=0;?>
						<?php foreach ($detils_siswa as $value) :  $i++;?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('el_siswa', 'id', $value['siswa_id'] , 'nama')?></td>
								<td><?= get_data('el_siswa', 'id', $value['siswa_id'] , 'nis')?></td>								
								<td><a class="btn btn-default btn-xs" target="_blank" href="<?= site_url('siswa/detils').'/'.base64_encode($value['siswa_id']) ?>"><i class="fa fa-fw fa-search"></i> Lihat Nilai</a></td>								
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