
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("customer"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" method="post">
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
				<li class="">
					<a data-toggle="tab" href="#contact">
						<i class="fa fa-address-book"></i>
						Contact
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#date-3">
						<i class="fa fa-calendar"></i>
						Anniversary
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
									<?= $this->lang->line('overview'); ?>
								</header>
								
								<div class="panel-body">
									<div id="error-area">
										<?php if (isset($error)) echo '<div class="alert alert-danger alert-dismissable">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.
											'</div>'; ?>
									</div>
								
									<div class="form-group">
										<label for="nama" class="col-sm-2 control-label"><?= $this->lang->line('customer_nama'); ?> <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="nama" name="nama" placeholder="<?= $this->lang->line('customer_nama'); ?>" 
												required minlength="3" maxlength="200" data-bind="value: nama" />
										</div>
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label"><?= $this->lang->line('customer_type'); ?> <sup class="text-info">*)</sup>/ Membership </label>
										<div class="col-sm-5">
											<select class="form-control" name="m_customer_type" required
												required data-bind="foreach: $root.availableCustomerType, value: customerType, optionsCaption: 'Choose Customer Type'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('customer_type'); ?> ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" name="id_m_membership_type"
												data-bind="foreach: $root.availableMembershipType, value: membershipType, optionsCaption: 'Choose Membership Type'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Membership Type ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="telp" class="col-sm-2 control-label"><?= $this->lang->line('customer_telp'); ?></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="telp" name="telp" placeholder="<?= $this->lang->line('customer_telp'); ?>" 
												minlength="3" maxlength="20" data-bind="value: telp" />
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="col-sm-2 control-label"><?= $this->lang->line('customer_email'); ?> / <?= $this->lang->line('customer_website'); ?></label>
										<div class="col-sm-5">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email" data-parsley-trigger="change" 
												maxlength="100" data-bind="value: email" />
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control" id="website" name="website" placeholder="Website" maxlength="100" data-bind="value: website" />
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
									<?= $this->lang->line('customer_billing'); ?>
								</header>
								
								<div class="panel-body">
									<div class="form-group">
										<label for="billing_address" class="col-sm-3 control-label"><?= $this->lang->line('customer_alamat'); ?></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="billing_address" name="billing_address" placeholder="<?= $this->lang->line('customer_billing'); ?>" 
												maxlength="150" data-bind="value: billing_address" />
										</div>
									</div>
									<div class="form-group">
										<label for="provinces_billing" class="col-sm-3 control-label"><?= $this->lang->line('id_provinces'); ?></label>
										<div class="col-sm-9">
											<select class="form-control" name="provinces_billing"
												data-bind="foreach: $root.availableProvincesBilling, value: provincesBilling, optionsCaption: 'Choose Provinces'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('id_provinces'); ?> ---</option>
												<option data-bind="attr: { value: id }, text: name"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regencies_billing" class="col-sm-3 control-label"><?= $this->lang->line('id_regencies'); ?></label>
										<div class="col-sm-9">
											<select class="form-control" name="regencies_billing"
												data-bind="options:availableRegenciesBilling, optionsText:'name', optionsValue:'id', 
												optionsCaption:'--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('id_regencies'); ?> ---', value:regenciesBilling">
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="postal_code_billing" class="col-sm-3 control-label"><?= $this->lang->line('customer_kodepos'); ?></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="postal_code_billing" name="postal_code_billing" placeholder="<?= $this->lang->line('customer_kodepos_billing'); ?>" 
												maxlength="10" data-bind="value: postal_code_billing" />
										</div>
									</div>
								</div>
							</section>
						</div>
						
						<div class="col-lg-6">
							<section class="panel">
								<header class="panel-heading">
									<?= $this->lang->line('customer_shipping'); ?>
								</header>
								
								<div class="panel-body">
									<div class="form-group">
										<label for="shipping_address" class="col-sm-3 control-label"><?= $this->lang->line('customer_alamat'); ?></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="shipping_address" name="shipping_address" placeholder="<?= $this->lang->line('customer_shipping'); ?>" 
												maxlength="150" data-bind="value: shipping_address" />
										</div>
									</div>
									<div class="form-group">
										<label for="provinces_shipping" class="col-sm-3 control-label"><?= $this->lang->line('id_provinces'); ?></label>
										<div class="col-sm-9">
											<select class="form-control" name="provinces_shipping"
												data-bind="foreach: $root.availableProvincesBilling, value: provincesShipping, optionsCaption: 'Choose Provinces'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('id_provinces'); ?> ---</option>
												<option data-bind="attr: { value: id }, text: name"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regencies_shipping" class="col-sm-3 control-label"><?= $this->lang->line('id_regencies'); ?></label>
										<div class="col-sm-9">
											<select class="form-control" name="regencies_shipping"
												data-bind="options:availableRegenciesShipping, optionsText:'name', optionsValue:'id', 
												optionsCaption:'--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('id_regencies'); ?> ---', value:regenciesShipping">
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="postal_code_shipping" class="col-sm-3 control-label"><?= $this->lang->line('customer_kodepos'); ?></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="postal_code_shipping" name="postal_code_shipping" placeholder="<?= $this->lang->line('customer_kodepos_shipping'); ?>" 
												maxlength="10" data-bind="value: postal_code_shipping" />
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
									<?= $this->lang->line('detil'); ?>
								</header>
								
								<div class="panel-body">
									<div class="form-group">
										<label for="bentuk_usaha" class="col-sm-2 control-label"><?= $this->lang->line('bentuk_usaha'); ?> / <?= $this->lang->line('jenis_usaha'); ?></label>
										<div class="col-sm-5">
											<select class="form-control" name="bentuk_usaha"
												data-bind="foreach: $root.availableBentukUsaha, value: bentukUsaha, optionsCaption: 'Choose Bentuk Usaha'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('bentuk_usaha'); ?> ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" name="jenis_usaha"
												data-bind="foreach: $root.availableJenisUsaha, value: jenisUsaha, optionsCaption: 'Choose Jenis Usaha'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('jenis_usaha'); ?> ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="industry_type" class="col-sm-2 control-label"><?= $this->lang->line('jenis_industri'); ?></label>
										<div class="col-sm-10">
											<select class="form-control" name="industry_type"
												data-bind="foreach: $root.availableIndustryType, value: industryType, optionsCaption: 'Choose Industry Type'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('jenis_industri'); ?> ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="npwp" class="col-sm-2 control-label">NPWP</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP" 
												minlength="8" maxlength="30" data-bind="value: npwp" />
										</div>
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-sm-2 control-label"><?= $this->lang->line('customer_ket'); ?></sup></label>
										<div class="col-sm-10">
											<textarea class="wysihtml5 form-control" id="keterangan" name="keterangan" rows="9" 
												data-bind="value: keterangan"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="status" class="col-sm-2 control-label"><?= $this->lang->line('customer_status'); ?></sup></label>
										<div class="col-sm-10 icheck-row">
											<input class="iCheck-square-green" type="checkbox" id="status" name="status" value="1" data-bind="checked: isActive"/>
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
							<a class="btn btn-primary" data-bind="click: addContacts"><i class="fa fa-plus"></i> <?= $this->lang->line('customer_contact_add'); ?></a>
							<br />
							<table class="table table-striped table-hover" id="toroc">
								<thead>
									<tr>
										<th></th>
										<th><?= $this->lang->line('m_salutation'); ?></th>
										<th><?= $this->lang->line('customer_contact_nama'); ?></th>
										<th><?= $this->lang->line('jabatan'); ?></th>
										<th><?= $this->lang->line('customer_contact_telp'); ?></th>
										<th><?= $this->lang->line('customer_contact_email'); ?></th>
										<th><?= $this->lang->line('customer_contact_ket'); ?></th>
										<th><?= $this->lang->line('action'); ?></th>
									</tr>
								</thead>
								<tbody data-bind="sortable: contacts">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableSalutations, value: selectedSalutation, optionsCaption: 'Choose Salutation'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('m_salutation'); ?> ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="text" required class="form-control" value="" data-bind="value: contact_nama" /> </td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableJabatans, value: selectedJabatan, optionsCaption: 'Choose Title'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('jabatan'); ?> ---</option>
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
							<a class="btn btn-primary" data-bind="click: addContacts"><i class="fa fa-plus"></i> <?= $this->lang->line('customer_contact_add'); ?></a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
				<div id="date-3" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addEvents"><i class="fa fa-plus"></i> <?= $this->lang->line('customer_event_add'); ?></a>
							<br />
							<table class="table table-striped table-hover" id="torob">
								<thead>
									<tr>
										<th></th>
										<th><?= $this->lang->line('customer_event_tgl'); ?></th>
										<th><?= $this->lang->line('event_type'); ?></th>
										<th><?= $this->lang->line('customer_event_ket'); ?></th>
										<th><?= $this->lang->line('action'); ?></th>
									</tr>
								</thead>
								<tbody data-bind="sortable: events">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td><input type="text" required class="form-control" value="" data-bind="datepicker: tanggal" /> </td>
										<td>
											<select required class="form-control" data-bind="foreach: $root.availableEvents, value: selectedEvent, optionsCaption: 'Choose Event Type'">
												<option value="" selected data-bind="visible: $index() == 0">--- <?= $this->lang->line('pilih'); ?> <?= $this->lang->line('event_type'); ?> ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="text" class="form-control" data-bind="value: keterangan" /></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeEntity"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="events" data-bind="value: ko.toJSON(events)" />
							<a class="btn btn-primary" data-bind="click: addEvents"><i class="fa fa-plus"></i> <?= $this->lang->line('customer_event_add'); ?></a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
</div>
</form>