
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" data-parsley-validate  class="form-horizontal" action="<?php echo base_url("journal"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" method="post">
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
										
										<label for="alamat" class="col-sm-2 control-label">Date <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input class="form-control" placeholder="Created Date" value="" required data-bind="datepicker: tanggal" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Debit 1 <sup class="text-info">*)</sup></label>
										<div class="col-sm-5">
											<select class="form-control" 
												required data-bind="value: coaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<input type="number" step="0.01" min="0" class="form-control" placeholder="Value Debit 1" required data-bind="value: besar_debet1" />
										</div>
									</div>

									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Debit 2 </label>
										<div class="col-sm-5">
											<select class="form-control" 
												data-bind="value: coaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<input type="number" step="0.01" min="0" class="form-control" placeholder="Value Debit 2" data-bind="value: besar_debet2" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Debit 3 </label>
										<div class="col-sm-5">
											<select class="form-control" 
												data-bind="value: coaDebet3, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debit 3 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<input type="number" step="0.01" min="0" class="form-control" placeholder="Value Debit 3" data-bind="value: besar_debet3" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Credit 1 <sup class="text-info">*)</sup></label>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												required data-bind="value: coaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<input type="number" step="0.01" min="0" class="form-control" placeholder="Value Credit 1" required data-bind="value: besar_credit1" />
										</div>
									</div>

									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Credit 2 </label>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												data-bind="value: coaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<input type="number" step="0.01" min="0" class="form-control" placeholder="Value Credit 2" data-bind="value: besar_credit2" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Credit 3 </label>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												data-bind="value: coaCredit3, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 3 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<input type="number" step="0.01" min="0" class="form-control" placeholder="Value Credit 3" data-bind="value: besar_credit3" />
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="ui two statistics">
												<div class="statistic">
													<div class="value">
														<span data-bind="text: totalDebet">0</span>
													</div>
													<div class="label">
														Total Debet
													</div>
												</div>
												<div class="statistic">
													<div class="value">
														<span data-bind="text: totalCredit">0</span>
													</div>
													<div class="label">
														Total Credit
													</div>
												</div>
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
									Details
								</header>
								
								<div class="panel-body">
									<div class="form-group">
										<label for="keterangan" class="col-sm-2 control-label">Description</sup></label>
										<div class="col-sm-10">
											<textarea name="keterangan" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: keterangan"></textarea>
										</div>
									</div>									
									<input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-primary" data-bind="enabled: $root.balance() == 0">Submit</button>
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