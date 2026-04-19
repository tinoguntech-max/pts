
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("profile"); ?>/<?php echo $viewoptions['action']; ?>" method="post">
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
										<label for="nama" class="col-sm-2 control-label">Nama <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" 
												required minlength="3" maxlength="100" data-bind="value: nama" />
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
										<label for="bentuk_usaha" class="col-sm-2 control-label">Jenis Identitas / No Identitas </label>
										<div class="col-sm-5">
											<select class="form-control" name="id_m_jenis_identitas" required
												data-bind="foreach: $root.availableJenisIdentitas, value: jenisIdentitas, optionsCaption: 'Pilih Jenis Identitas'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Jenis Identitas ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
										
										<div class="col-sm-5">
											<input type="integer" class="form-control" id="ssn_nric" name="ssn_nric" placeholder="No Identitas" 
												minlength="3" maxlength="11" data-bind="value: ssn_nric" />
										</div>
									</div>
									<div class="form-group">
										
										<label for="alamat" class="col-sm-2 control-label">Alamat</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" 
												minlength="3" maxlength="200" data-bind="value: alamat" />
										</div>
									</div>
									<div class="form-group">
										<label for="telp" class="col-sm-2 control-label">Telp </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="telp" name="telp" placeholder="Nomer Telp" 
												minlength="3" maxlength="50" data-bind="value: telp" />
										</div>
										<label for="email" class="col-sm-1 control-label">Email <sup class="text-info"></sup></label>
										<div class="col-sm-5">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email" 
												 minlength="3" maxlength="100" data-bind="value: email" />
										</div>
									</div>
									<div class="form-group">
										<label for="id_m_pendidikan_terakhir" class="col-sm-2 control-label">Agama </label>
										<div class="col-sm-10">
											<select class="form-control" name="id_m_agama"
												data-bind="foreach: $root.availableAgama, value: agama, optionsCaption: 'Pilih Agama'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Agama ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="id_m_golongan_darah" class="col-sm-2 control-label">Golongan Darah </label>
										<div class="col-sm-10">
											<select class="form-control" name="id_m_golongan_darah"
												data-bind="foreach: $root.availableGolonganDarah, value: golonganDarah, optionsCaption: 'Pilih Golongan Darah';">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Golongan Darah ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
										
									</div>
									<div class="form-group">
										
										<label for="id_m_kewarganegaraan" class="col-sm-2 control-label">Kewarganegaraan </label>
										<div class="col-sm-10">
											<select class="form-control" name="id_m_nationality"
												data-bind="foreach: $root.availableNationality, value: nationality, optionsCaption: 'Pilih Kewarganegaraan';">'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Kewarganegaraan ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="id_m_pendidikan_terakhir" class="col-sm-2 control-label">Status Pernikahan</label>
										<div class="col-sm-4">
											<select class="form-control" name="id_m_status_pernikahan"
												data-bind="foreach: $root.availableStatusPernikahan, value: statusPernikahan, optionsCaption: 'Pilih Status'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Status Pernikahan ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
										<label for="screen_language" class="col-sm-1 control-label">Bahasa <sup class="text-info">*)</sup></label>
										<div class="col-sm-5">
											<select class="form-control" name="screen_language"
												required data-bind="foreach: $root.availableScreenLanguage, value: screenLanguage, optionsCaption: 'Pilih Bahasa';">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Bahasa ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
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
										<th>Jenis Sertifikat</th>
										<th>Institusi</th>
										<th>Granted</th>
										<th>Valid</th>
										<th>Keterangan</th>
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
							<input type="hidden" name="certifications" data-bind="value: ko.toJSON(certifications)" />
							<a class="btn btn-primary" data-bind="click: addCertifications"><i class="fa fa-plus"></i> Tambah Certification</a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
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
										<th>Nama</th>
										<th>Relationship</th>
										<th>Tanggal Lahir</th>
										<th>Id Number</th>
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
							<input type="hidden" name="dependents" data-bind="value: ko.toJSON(dependents)" />
							<a class="btn btn-primary" data-bind="click: addDependents"><i class="fa fa-plus"></i> Tambah Certification</a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
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
							<input type="hidden" name="educations" data-bind="value: ko.toJSON(educations)" />
							<a class="btn btn-primary" data-bind="click: addEducations"><i class="fa fa-plus"></i> Tambah Education</a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
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
							<input type="hidden" name="languages" data-bind="value: ko.toJSON(languages)" />
							<a class="btn btn-primary" data-bind="click: addLanguages"><i class="fa fa-plus"></i> Tambah Language</a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
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
							<input type="hidden" name="skills" data-bind="value: ko.toJSON(skills)" />
							<a class="btn btn-primary" data-bind="click: addSkills"><i class="fa fa-plus"></i> Tambah Skill</a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
</div>
</form>