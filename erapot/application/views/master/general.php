
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("general"); ?>/<?php echo $viewoptions['action']; ?>" method="post">
<div id="page-wrapper" class="wrapper">
	<section class="panel">
		<header class="panel-heading tab-dark tab-right ">
			<ul class="nav nav-tabs pull-right">
				<li class="active">
					<a data-toggle="tab" href="#about-3">
						<i class="fa fa-user"></i>
						Edit General
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#column">
						<i class="fa fa-tag"></i>
						Edit Users columns
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#pos">
						<i class="fa fa-percent"></i>
						POS Percent
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
										<label for="nama" class="col-sm-2 control-label">Nama Lengkap <sup class="text-info">*)</sup>/ Singkat </label>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Nama Lengkap" 
												  minlength="1" maxlength="200" data-bind="value: nama_lengkap" />
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Nama Singkat" 
												 minlength="1" maxlength="200" data-bind="value: nama_singkat" />
										</div>
									</div>
									<div class="form-group">
										<label for="alamat" class="col-sm-2 control-label"> Alamat Lengkap<sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" placeholder="Alamat Lengkap" 
												required minlength="5" maxlength="200" data-bind="value: alamat_lengkap" />
										</div>
									</div>
									<div class="form-group">
										<label for="alamat1" class="col-sm-2 control-label"> Alamat Baris Pertama / Kedua</label>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Alamat Baris Pertama" 
												minlength="5" maxlength="200" data-bind="value: alamat_baris1" />
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Alamat Baris Kedua" 
												minlength="5" maxlength="200" data-bind="value: alamat_baris2" />
										</div>
									</div>
									<div class="form-group">
										<label for="alamat2" class="col-sm-2 control-label"> Alamat Baris Ketiga</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" placeholder="Alamat Baris Ketiga" 
												minlength="5" maxlength="200" data-bind="value: alamat_baris3" />
										</div>
									</div>
									<div class="form-group">
										<label for="contact" class="col-sm-2 control-label"> Contact Lengkap / Telepon </label>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Contact Lengkap" 
												required minlength="5" maxlength="200" data-bind="value: contact_lengkap" />
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control"  placeholder="Contact Telepon" 
												minlength="4" maxlength="200" data-bind="value: contact_telepon" />
										</div>
									</div>									
									<input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
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
				
				<div id="pos" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									POS Manage
								</header>
								
								<div class="panel-body">									
									<div class="form-group">
										<label for="nama" class="col-sm-2 control-label"> TAX POS<sup class="text-info">*)</sup> </label>
										<div class="col-sm-10">
											<input type="number" class="form-control" placeholder="TAX POS" 
												  data-bind="value: tax_pos" />
										</div>
									</div>								
									<div class="form-group">
										<label for="nama" class="col-sm-2 control-label"> DISC POS <sup class="text-info">*)</sup> </label>
										<div class="col-sm-10">
											<input type="number" class="form-control" placeholder="DISC POS" 
												   data-bind="value: disc_pos" />
										</div>
									</div>
									<input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
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
				
				<div id="column" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									Colomns
								</header>
								
								<div class="panel-body">									
									<div class="form-group">
										<label for="id_satuan" class="col-sm-2 control-label">Driver</label>
										<div class="col-sm-10">
											<select class="form-control" 
												data-bind="value: driver, valueAllowUnset: true, options: $root.availableDriver, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Driver ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="id_satuan" class="col-sm-2 control-label">Service Type </label>
										<div class="col-sm-10">
											<select class="form-control" 
												data-bind="value: serviceType, valueAllowUnset: true, options: $root.availableServiceType, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Service Type ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="id_satuan" class="col-sm-2 control-label">Cost Type </label>
										<div class="col-sm-10">
											<select class="form-control" 
												 data-bind="value: costType, valueAllowUnset: true, options: $root.availableCostType, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Service Type ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
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
								
			</div>
		</div>
	</section>
	
</div>
</form>