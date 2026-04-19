
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
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>NIS</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['nis']; ?>
						</div>
					</div>		
					
				</div>
			</section>
		</div>
	</div>
	
	
	<?php if (isset($ary_value)) : ?>
	<?php if (is_array($ary_value)) :  ?>
	<?php foreach ($ary_value as $value) :  ?>
	<?php if (!empty($value['detil'])) : $a= 0; ?>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					<?= $value['nama'] ?>
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<?php foreach ($value['detil'] as $value_detil) : ?>
								<th >Nilai Tugas <?= $value_detil['id_tugas'] ?></th>
								<?php endforeach; ?>
							</tr>
						</thead>
							<tr>
								<?php foreach ($value['detil'] as $value_detil) :  ?>
								<td " > <?php if (!empty($value_detil['nilai'])) 
								echo $value_detil['nilai'];
								else
								echo "-";?>  </td>
								<?php endforeach; ?>
							</tr>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>	
	<?php endif; ?>
	<?php endforeach; ?>
	<?php endif; ?>
	<?php endif; ?>
</div>
</form>