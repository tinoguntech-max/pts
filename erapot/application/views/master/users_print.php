
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
						<div class="col-sm-2 text-right"><strong>Username</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['user_name']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>User Level</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo get_data('access_group','id',$detil[0]['user_level'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Name</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['nama']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Branch</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_cabang','id',$detil[0]['id_m_cabang'],'nama'); ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Department</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_department','id',$detil[0]['id_m_department'],'nama'); ?>
						</div>
					</div>
					
				<header class="panel-heading">
					User's Identity
				</header>
				
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Nationality</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_nationality','id',$detil[0]['id_m_nationality'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Identity Type</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_jenis_identitas','id',$detil[0]['id_m_jenis_identitas'],'nama'); ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Identity Number</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['ssn_nric']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Address</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['alamat']; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Religion</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_agama','id',$detil[0]['id_m_agama'],'nama'); ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Marital Status</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_status_pernikahan','id',$detil[0]['id_m_status_pernikahan'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Phone Number</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['telp']; ?>
						</div>
						<div class="col-sm-2 text-right"><strong>Email</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo $detil[0]['email']; ?>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Blood Type</strong></div>
						<div class="col-sm-4">
							<?php if(isset($detil)) echo get_data('m_golongan_darah','id',$detil[0]['id_m_golongan_darah'],'nama'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 text-right"><strong>Language</strong></div>
						<div class="col-sm-10">
							<?php if(isset($detil)) echo $detil[0]['screen_language']; ?>
						</div>
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
					User's Language
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Language</th>
								<th>Reading</th>
								<th>Speaking</th>
								<th>Writing</th>
								<th>Understanding</th>
							</tr>
						</thead>
							<?php if (isset($users_language)) : ?>
							<?php if (is_array($users_language)) : $i = 0; ?>
							<?php foreach ($users_language as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('m_language','id',$value['id_m_language'],'nama') ?></td>
								<td><?= get_data('m_proficiency','id',$value['id_m_proficiency_reading'],'nama') ?></td>
								<td><?= get_data('m_proficiency','id',$value['id_m_proficiency_speaking'],'nama') ?></td>
								<td><?= get_data('m_proficiency','id',$value['id_m_proficiency_writing'],'nama') ?></td>
								<td><?= get_data('m_proficiency','id',$value['id_m_proficiency_understanding'],'nama') ?></td>
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
					User's Certification
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Certification</th>
								<th>Institute</th>
								<th>Granted On</th>
								<th>Valid Through</th>
								<th>Description</th>
							</tr>
						</thead>
							<?php if (isset($users_certification)) : ?>
							<?php if (is_array($users_certification)) : $i = 0; ?>
							<?php foreach ($users_certification as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('m_certification','id',$value['id_m_certification'],'nama') ?></td>
								<td><?= $value['institute'] ?></td>
								<td><?= $value['granted_on'] ?></td>
								<td><?= $value['valid_thru'] ?></td>
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
					User's Skill
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Skill</th>
								<th>Value</th>
								<th>Description</th>
							</tr>
						</thead>
							<?php if (isset($users_skill)) : ?>
							<?php if (is_array($users_skill)) : $i = 0; ?>
							<?php foreach ($users_skill as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('m_skill','id',$value['id_m_skill'],'nama') ?></td>
								<td><?= $value['nilai'] ?></td>
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
					User's Dependent
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Nama</th>
								<th>Relationship</th>
								<th>Birth Date</th>
								<th>Identity Number</th>
							</tr>
						</thead>
							<?php if (isset($users_dependent)) : ?>
							<?php if (is_array($users_dependent)) : $i = 0; ?>
							<?php foreach ($users_dependent as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $value['nama'] ?></td>
								<td><?= get_data('m_relationship','id',$value['id_m_relationship'],'nama') ?></td>
								<td><?= $value['tanggal_lahir'] ?></td>
								<td><?= $value['id_number'] ?></td>
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
					User's Education
				</header>
				
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Education</th>
								<th>Institute</th>
								<th>Start Date</th>
								<th>Completed On</th>
								<th>Description</th>
							</tr>
						</thead>
							<?php if (isset($users_education)) : ?>
							<?php if (is_array($users_education)) : $i = 0; ?>
							<?php foreach ($users_education as $value) : $i ++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= get_data('m_education','id',$value['id_m_education'],'nama') ?></td>
								<td><?= $value['institute'] ?></td>
								<td><?= $value['start_date'] ?></td>
								<td><?= $value['completed_on'] ?></td>
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