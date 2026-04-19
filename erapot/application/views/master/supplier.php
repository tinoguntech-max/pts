
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("supplier"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" method="post">
<input type="hidden" class="form-control" name="primary" data-bind="value: primary" />
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
										<label for="telp" class="col-sm-2 control-label">NIS<sup class="text-info">*)</sup> </label>
										<div class="col-sm-10">
											<input type="text" required class="form-control" id="nik" name="nik" placeholder="nik" 
											 minlength="3" maxlength="30" data-bind="value: nik" />
										</div>
									</div>
								
									<div class="form-group">
										<label for="nama" class="col-sm-2 control-label">Nama<sup class="text-info">*)</sup> / Alamat </label>
										<div class="col-sm-5">
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Murid" 
												required minlength="3" maxlength="200" data-bind="value: nama" />
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" 
												minlength="3" maxlength="200" data-bind="value: alamat" />
										</div>
									</div>
                                    <div class="form-group">
										<label for="regencies" class="col-sm-2 control-label">Kelas<sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<select class="form-control" name="kelas" 
												required data-bind="foreach: $root.availableCabangs, value: kelas, optionsCaption: 'Choose Kelas'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Kelas ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
                                    <div class="form-group">
										<label for="regencies" class="col-sm-2 control-label">Provinces<sup class="text-info">*)</sup> / Regencies<sup class="text-info">*)</sup></label>
										<div class="col-sm-5">
											<select class="form-control" name="provinces" 
												required data-bind="foreach: $root.availableProvinces, value: provinces, optionsCaption: 'Choose Provinces'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Provinces ---</option>
												<option data-bind="attr: { value: id }, text: name"></option>
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" name="regencies" 
												required data-bind="foreach: $root.availableRegencies, value: regencies, optionsCaption: 'Choose Regencies'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Regencies ---</option>
												<option data-bind="attr: { value: id }, text: name"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="telp" class="col-sm-2 control-label">Telp</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="telp" name="telp" placeholder="Telp Murid" 
											 minlength="3" maxlength="30" data-bind="value: telp" />
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
										<label for="nama" class="col-sm-2 control-label">Nama Wali Murid<sup class="text-info"></sup> / Telp Wali Murid</label>
										<div class="col-sm-5">
											<input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Nama Wali Murid" 
												 minlength="3" maxlength="200" data-bind="value: nama_wali" />
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control" id="telp_wali" name="telp_wali" placeholder="Telp Wali Murid" 
												minlength="3" maxlength="200" data-bind="value: telp_wali" />
										</div>
									</div>
									<div class="form-group">
										<label for="cp_nama" class="col-sm-2 control-label">Alamat Wali</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="alamat_wali" name="alamat_wali" placeholder="Aalamat Wali Murid" 
												minlength="3" data-bind="value: alamat_wali" />
										</div>
									</div>
									<div class="form-group">
										<label for="cp_nama" class="col-sm-2 control-label">Email</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email" 
												minlength="3"  data-bind="value: email" />
										</div>
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-sm-2 control-label">Keterangan </label>
										<div class="col-sm-10">
											<textarea class="wysihtml5 form-control" id="keterangan" name="keterangan" rows="9" 
												data-bind="wysiwyg: keterangan"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="status" class="col-sm-2 control-label"></label>
										<div class="ui toggle checkbox">
											<input type="checkbox" name="status" data-bind="checked: isActive" />
											<label>Active</label>
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
				
				<div id="contact" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addContacts"><i class="fa fa-plus"></i> Tambah Contact</a>
							<br />
							<table class="table table-striped table-hover" id="toroc">
								<thead>
									<tr>
										<th></th>
										<th>Salutation</th>
										<th>Name</th>
										<th>Title</th>
										<th>Telp</th>
										<th>Email</th>
										<th>Description</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: contacts">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableSalutations, value: selectedSalutation, optionsCaption: 'Choose Salutation'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Salutation ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="text" required class="form-control" value="" data-bind="value: contact_nama" /> </td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableJabatans, value: selectedJabatan, optionsCaption: 'Choose Title'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Title ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input required minlength="3" maxlength="20" type="text" class="form-control" data-bind="value: contact_telp" /></td>
										<td><input type="email" class="form-control" data-bind="value: contact_email" /></td>
										<td><input type="text" class="form-control" data-bind="value: contact_keterangan" /></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeContact"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="contacts" data-bind="value: ko.toJSON(contacts)" />
							<a class="btn btn-primary" data-bind="click: addContacts"><i class="fa fa-plus"></i> Tambah Contact</a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
</div>
</form>