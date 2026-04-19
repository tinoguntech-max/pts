
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("general_coa"); ?>/<?php echo $viewoptions['action']; ?>" method="post">
<div id="page-wrapper" class="wrapper">
	<section class="panel">
		<header class="panel-heading tab-dark tab-right ">
			<ul class="nav nav-tabs pull-right">
				<li class="active">
					<a data-toggle="tab" href="#about-3">
						<i class="fa fa-info"></i>
						General COA
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
										<label for="users" class="col-sm-2 control-label">Item Recipt Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: purchaseReciptCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: purchaseReciptCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: purchaseReciptCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: purchaseReciptCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Purchase Return Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: purchaseReturnCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: purchaseReturnCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: purchaseReturnCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: purchaseReturnCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Debt Payment Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: purchasePaymentCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: purchasePaymentCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: purchasePaymentCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: purchasePaymentCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Delivery Order Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: salesDeliveryCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: salesDeliveryCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: salesDeliveryCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: salesDeliveryCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Sales Return Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: salesReturnCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: salesReturnCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: salesReturnCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: salesReturnCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Payment of Receivables Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: salesPaymentCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: salesPaymentCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: salesPaymentCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: salesPaymentCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Motorcycle Recipt Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: motorPurchaseReciptCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: motorPurchaseReciptCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: motorPurchaseReciptCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: motorPurchaseReciptCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Recipt of Charge Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: motorPurchasePaymentCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: motorPurchasePaymentCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: motorPurchasePaymentCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: motorPurchasePaymentCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Delivery Order Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: motorSalesDeliveryCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: motorSalesDeliveryCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: motorSalesDeliveryCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: motorSalesDeliveryCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Motorcycle Payment Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: motorSalesPaymentCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: motorSalesPaymentCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: motorSalesPaymentCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: motorSalesPaymentCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Payroll Request Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: payrollRequestCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: payrollRequestCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: payrollRequestCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: payrollRequestCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>										
									</div>
									<div class="form-group">
										<label for="users" class="col-sm-2 control-label">Payroll Payment Debet / Credit</label>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: payrollPaymentCoaDebet1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" 
												 data-bind="value: payrollPaymentCoaCredit1, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 1 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<select class="form-control" 
												 data-bind="value: payrollPaymentCoaDebet2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Debet 2 ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-4 col-sm-offset-1">
											<select class="form-control" 
												 data-bind="value: payrollPaymentCoaCredit2, valueAllowUnset: true, options: $root.availableCoa, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Credit 2 ---', 
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