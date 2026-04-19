
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
<div id="page-wrapper" class="wrapper">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Overview
				</header>
				
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Date</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['tanggal']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Debit 1</strong></div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo get_data('m_coa','id',$detil[0]['id_m_coa_debet1'],'nama'); ?>
						</div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo $detil[0]['besar_debet1']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Debit 2</strong></div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo get_data('m_coa','id',$detil[0]['id_m_coa_debet2'],'nama'); ?>
						</div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo $detil[0]['besar_debet2']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Debit 3</strong></div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo get_data('m_coa','id',$detil[0]['id_m_coa_debet3'],'nama'); ?>
						</div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo $detil[0]['besar_debet3']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Credit 1</strong></div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo get_data('m_coa','id',$detil[0]['id_m_coa_credit1'],'nama'); ?>
						</div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo $detil[0]['besar_credit1']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Debit 2</strong></div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo get_data('m_coa','id',$detil[0]['id_m_coa_credit2'],'nama'); ?>
						</div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo $detil[0]['besar_credit2']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Debit 3</strong></div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo get_data('m_coa','id',$detil[0]['id_m_coa_credit3'],'nama'); ?>
						</div>
						<div class="col-sm-5">
							<?php if(isset($detil)) echo $detil[0]['besar_credit3']; ?>
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
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Description</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['keterangan']; ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>	
	
</div>
</form>
