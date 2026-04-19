
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("users"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" method="post">
<div id="page-wrapper" class="wrapper">
	<section class="panel">
		<header class="panel-heading tab-dark tab-right ">
			<ul class="nav nav-tabs pull-right">
				<li class="active">
					<a data-toggle="tab" href="#about-3">
						<i class="fa fa-user"></i>
						About
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#language">
						<i class="fa fa-globe"></i>
						Language
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#certification">
						<i class="fa fa-star"></i>
						Certificataion
					</a>
				</li> 
				<li class="">
					<a data-toggle="tab" href="#skill">
						<i class="fa fa-area-chart"></i>
						Skill
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#dependent">
						<i class="fa fa-street-view"></i>
						Dependent
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#education">
						<i class="fa fa-street-view"></i>
						Education
					</a>
				</li>
			</ul>
			<span class="hidden-sm wht-color"><?php echo $viewoptions['pageinfo']; ?></span>
		</header>
		<div class="panel-body">
			<div class="tab-content">
				<div id="about-3" class="tab-pane active">
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									Overview
								</header>
								
								<div class="panel-body">
									<div id="error-area">
										<?php if (isset($error)) echo '<div class="alert alert-danger alert-dismissable">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.
											'</div>'; ?>
									</div>
								
									<div class="form-group">
										<label for="user_name" class="col-sm-2 control-label">Username<sup class="text-info">*)</sup> / Password <sup class="text-info">*)</sup></label>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Nama User" data-bind="value: user_name" />
										</div>
										<div class="col-sm-5">
											<input type="password" class="form-control" placeholder="Password" 
												<?php if($viewoptions['action'] != 'update') echo "required"; ?> data-bind="value: user_pass" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">User Level </label>
										<div class="col-sm-10">
											<select class="form-control" 
												data-bind="value: userLevel, valueAllowUnset: true, options: $root.availableUserLevel, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose User Level ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label for="nama" class="col-sm-2 control-label">Name <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" placeholder="Nama" data-bind="value: nama" />
										</div>
									</div>
									<div class="form-group">
										<label for="cabang_devisi" class="col-sm-2 control-label">Barch / Department </label>
										<div class="col-sm-5">
											<select class="form-control" 
												data-bind="value: cabang, valueAllowUnset: true, options: $root.availableCabang, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Pilih Cabang ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												data-bind="value: department, valueAllowUnset: true, options: $root.availableDepartment, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Pilih Department ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
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
										<label for="bentuk_usaha" class="col-sm-2 control-label">Identity Type / Number </label>
										<div class="col-sm-5">
											<select class="form-control" 
												data-bind="value: jenisIdentitas, valueAllowUnset: true, options: $root.availableJenisIdentitas, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Pilih Jenis Identitas ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										
										<div class="col-sm-5">
											<input type="alphanum" class="form-control" placeholder="No Identitas" data-bind="value: ssn_nric" />
										</div>
									</div>
									<div class="form-group">
										
										<label for="alamat" class="col-sm-2 control-label">Address</label>
										<div class="col-sm-10">
											<input type="text" class="form-control"  placeholder="alamat" data-bind="value: alamat" />
										</div>
									</div>
									<div class="form-group">
										<label for="bentuk_usaha" class="col-sm-2 control-label">Phone Number / Email </label>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Nomer Telp" data-bind="value: telp" />
										</div>
										<div class="col-sm-5">
											<input type="email" class="form-control" placeholder="Email" data-bind="value: email" />
										</div>
									</div>
									<div class="form-group">
										<label for="id_m_agama" class="col-sm-2 control-label">Religion </label>
										<div class="col-sm-10">
											<select class="form-control" 
												data-bind="value: agama, valueAllowUnset: true, options: $root.availableAgama, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Pilih Agama ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="id_m_golongan_darah" class="col-sm-2 control-label">Bloodh Type </label>
										<div class="col-sm-10">
											<select class="form-control" 
												data-bind="value: golonganDarah, valueAllowUnset: true, options: $root.availableGolonganDarah, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Pilih Golongan Darah ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										
									</div>
									<div class="form-group">
										
										<label for="id_m_nationality" class="col-sm-2 control-label">Nationalitiy </label>
										<div class="col-sm-10">
											<select class="form-control" 
												data-bind="value: nationality, valueAllowUnset: true, options: $root.availableNationality, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Natinality ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="bentuk_usaha" class="col-sm-2 control-label">Marital Status / Language *)</label>
										<div class="col-sm-5">
											<select class="form-control" 
												data-bind="value: statusPernikahan, valueAllowUnset: true, options: $root.availableStatusPernikahan, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Maritial Status ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												data-bind="value: screenLanguage, valueAllowUnset: true, options: $root.availableScreenLanguage, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Screen Language ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" data-bind="click:submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
				
				<div id="certification" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addCertifications"><i class="fa fa-plus"></i> Tambah Certification</a>
							<br />
							<table class="table table-striped table-hover" id="torog">
								<thead>
									<tr>
										<th></th>
										<th>Certification Type</th>
										<th>Institute</th>
										<th>Granted</th>
										<th>Valid</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: certifications">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableCertification, value: selectedCertification, optionsCaption: 'Choose certification'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Certification ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="text" class="form-control" required data-bind="value: certification_institute" /></td>
										<td><input type="text" required class="form-control" value="" data-bind="datepicker: certification_granted_on" /> </td>
										<td><input type="text" required class="form-control" value="" data-bind="datepicker: certification_valid_thru" /> </td>
										<td><input type="text" class="form-control" data-bind="value: certification_keterangan" /></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeCertification"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addCertifications"><i class="fa fa-plus"></i> Tambah Certification</a>
							<button type="submit" data-bind="click:submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div> 
				
				<div id="dependent" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addDependents"><i class="fa fa-plus"></i> Tambah Dependent</a>
							<br />
							<table class="table table-striped table-hover" id="toroh">
								<thead>
									<tr>
										<th></th>
										<th>Name</th>
										<th>Relationship</th>
										<th>Date Of Birth</th>
										<th>Number Id</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: dependents">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td><input type="text" class="form-control" required data-bind="value: dependent_nama" /></td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableRelationship, value: selectedRelationship, optionsCaption: 'Choose Relationship'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Relationship ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="text" required class="form-control" value="" data-bind="datepicker: dependent_tanggal_lahir" /> </td>
										<td><input type="text" required class="form-control" data-bind="value: dependent_id_number" /> </td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeDependent"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addDependents"><i class="fa fa-plus"></i> Tambah Certification</a>
							<button type="submit" data-bind="click:submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div> 
				
				<div id="education" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addEducations"><i class="fa fa-plus"></i> Tambah Education</a>
							<br />
							<table class="table table-striped table-hover" id="torog">
								<thead>
									<tr>
										<th></th>
										<th>Pendidikan</th>
										<th>Institusi</th>
										<th>Mulai</th>
										<th>Lulus</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: educations">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableEducation, value: selectedEducation, optionsCaption: 'Choose education'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Education ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="text" class="form-control" required data-bind="value: education_institute" /></td>
										<td><input type="text" required class="form-control" value="" data-bind="datepicker: education_start_date" /> </td>
										<td><input type="text" required class="form-control" value="" data-bind="datepicker: education_completed_on" /> </td>
										<td><input type="text" class="form-control" data-bind="value: education_keterangan" /></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeEducation"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addEducations"><i class="fa fa-plus"></i> Tambah Education</a>
							<button type="submit" data-bind="click:submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
				<div id="language" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addLanguages"><i class="fa fa-plus"></i> Tambah Language</a>
							<br />
							<table class="table table-striped table-hover" id="torod">
								<thead>
									<tr>
										<th></th>
										<th>Jenis Bahasa</th>
										<th>Reading</th>
										<th>Speaking</th>
										<th>Writing</th>
										<th>Understanding</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: languages">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableLanguages, value: selectedLanguage, optionsCaption: 'Choose Language'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Language ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableProficiencyReading, value: selectedProficiencyReading, optionsCaption: 'Choose Proficiency Reading'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Proficiency Reading ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableProficiencySpeaking, value: selectedProficiencySpeaking, optionsCaption: 'Choose Proficiency Speaking'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Proficiency Speaking ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableProficiencyWriting, value: selectedProficiencyWriting, optionsCaption: 'Choose Proficiency Writing'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Proficiency Writing ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableProficiencyUnderstanding, value: selectedProficiencyUnderstanding, optionsCaption: 'Choose Proficiency Understanding'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Proficiency Understanding ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeLanguage"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addLanguages"><i class="fa fa-plus"></i> Tambah Language</a>
							<button type="submit" data-bind="click:submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
				<div id="skill" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addSkills"><i class="fa fa-plus"></i> Tambah Skill</a>
							<br />
							<table class="table table-striped table-hover" id="torod">
								<thead>
									<tr>
										<th></th>
										<th>Jenis Skill</th>
										<th>Nilai</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: skills">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" required data-bind="foreach: $root.availableSkills, value: selectedSkill, optionsCaption: 'Choose Skill'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Skill ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="number" min="0" max="100" required class="form-control" data-bind="value: skill_nilai" /> </td>
										<td><input type="text" class="form-control" data-bind="value: skill_keterangan" /></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeSkill"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addSkills"><i class="fa fa-plus"></i> Tambah Skill</a>
							<button type="submit" data-bind="click:submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
</div>
</form>