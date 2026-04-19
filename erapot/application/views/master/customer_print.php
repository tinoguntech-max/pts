
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
						<div class="col-sm-2 text-right"><strong>Name</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['nama']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Customer Type</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo get_data('m_customer_type','id',$detil[0]['id_m_customer_type'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Phone Number</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['telp']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Email</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['email']; ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Website</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['website']; ?>
						</div>
					</div>
					
				</div>
			</section>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6">
			<section class="panel">
				<header class="panel-heading">
					Billing Address
				</header>
				
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-4 text-right"><strong>Address</strong></div>
						<div class="col-sm-8">
							<?php if(isset($detil)) echo $detil[0]['billing_address']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 text-right"><strong>Regency</strong></div>
						<div class="col-sm-8">
							<?php if(isset($detil)) echo get_data('regencies','id',$detil[0]['id_regencies_billing'],'name'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 text-right"><strong>Province</strong></div>
						<div class="col-sm-8">
							<?php if(isset($detil)) echo get_data('provinces','id',$detil[0]['id_provinces_billing'],'name'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 text-right"><strong>Postal Code</strong></div>
						<div class="col-sm-8">
							<?php if(isset($detil)) echo $detil[0]['postal_code_billing']; ?>
						</div>
					</div>
				</div>
			</section>
		</div>
		
		<div class="col-lg-6">
			<section class="panel">
				<header class="panel-heading">
					Shipping Address
				</header>
				
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-4 text-right"><strong>Address</strong></div>
						<div class="col-sm-8">
							<?php if(isset($detil)) echo $detil[0]['shipping_address']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 text-right"><strong>Regency</strong></div>
						<div class="col-sm-8">
							<?php if(isset($detil)) echo get_data('regencies','id',$detil[0]['id_regencies_shipping'],'name'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 text-right"><strong>Province</strong></div>
						<div class="col-sm-8">
							<?php if(isset($detil)) echo get_data('provinces','id',$detil[0]['id_provinces_shipping'],'name'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 text-right"><strong>Postal Code</strong></div>
						<div class="col-sm-8">
							<?php if(isset($detil)) echo $detil[0]['postal_code_shipping']; ?>
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
						<div class="col-sm-2 text-right"><strong>Firm</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_bentuk_usaha','id',$detil[0]['id_m_bentuk_usaha'],'nama'); ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Firm Type</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_jenis_usaha','id',$detil[0]['id_m_jenis_usaha'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Industry Type</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_industry_type','id',$detil[0]['id_m_industry_type'],'nama'); ?>
						</div>
						<div class="col-sm-2 text-right"><strong>NPWP</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['npwp']; ?>
						</div>
					</div>
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
	
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Contact
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover convert-data-table">
						<thead>
							<tr>
								<th></th>
								<th>Salutation</th>
								<th>Nama</th>
								<th>Jabatan</th>
								<th>Telp</th>
								<th>Email</th>
								<th>Keterangan</th>
							</tr>
						</thead>
							<?php if (isset($customer_contact)) : ?>
							<?php if (is_array($customer_contact)) : $i = 0; ?>
							<?php foreach ($customer_contact as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('m_salutation','id',$value['id_m_salutation'],'nama') ?></td>
								<td><?= $value['nama'] ?></td>
								<td><?= get_data('m_job_title','id',$value['id_m_job_title'],'nama') ?></td>
								<td><?= $value['telp'] ?></td>
								<td><?= $value['email'] ?></td>
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
					Events
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover convert-data-table">
						<thead>
							<tr>
								<th></th>
								<th>Date</th>
								<th>Type</th>
								<th>Description</th>
							</tr>
						</thead>
							<?php if (isset($customer_event)) : ?>
							<?php if (is_array($customer_event)) : $i = 0; ?>
							<?php foreach ($customer_event as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $value['tanggal'] ?></td>
								<td><?= get_data('m_crm_event_type','id',$value['id_m_crm_event_type'],'nama') ?></td>
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