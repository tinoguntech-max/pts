
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("general_template"); ?>/<?php echo $viewoptions['action']; ?>" method="post">
<div id="page-wrapper" class="wrapper">
	<section class="panel">
		<header class="panel-heading tab-dark tab-right ">
			<ul class="nav nav-tabs pull-right">
				<li class="active">
					<a data-toggle="tab" href="#about-3">
						<i class="fa fa-shopping-cart"></i>
						Template Pembelian
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#penjualan">
						<i class="fa fa-shopping-cart"></i>
						Template Penjualan
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#finance">
						<i class="fa fa-credit-card"></i>
						Finance
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
										<label for="beli_lazy" class="col-sm-2 control-label">Purchase Lazy Mode</sup></label>
										<div class="col-sm-10">
											<textarea name="jual_lazy" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_lazy"></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="beli_manual" class="col-sm-2 control-label">Manual Purchase</sup></label>
										<div class="col-sm-10">
											<textarea name="beli_manual" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_manual"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="beli_tender" class="col-sm-2 control-label">Open Tender</sup></label>
										<div class="col-sm-10">
											<textarea name="beli_quote" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_tender"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="beli_quote" class="col-sm-2 control-label">Request for Quotation</sup></label>
										<div class="col-sm-10">
											<textarea name="beli_quote" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_quote"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="beli_minta" class="col-sm-2 control-label">Purchase Request</sup></label>
										<div class="col-sm-10">
											<textarea name="beli_terima" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_minta"></textarea>
										</div>
									</div>	
									
									<div class="form-group">
										<label for="beli_order" class="col-sm-2 control-label">Purchase Order</sup></label>
										<div class="col-sm-10">
											<textarea name="beli_terima1" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_order"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="beli_terima" class="col-sm-2 control-label">Item Receipt</sup></label>
										<div class="col-sm-10">
											<textarea name="keterangan" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_terima"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="beli_invoice" class="col-sm-2 control-label">Receipt Invoice</sup></label>
										<div class="col-sm-10">
											<textarea name="keterangan" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_invoice"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="beli_retur" class="col-sm-2 control-label">Purchase Retur</sup></label>
										<div class="col-sm-10">
											<textarea name="beli_retur" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: beli_retur"></textarea>
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
				
				<div id="penjualan" class="tab-pane">
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
										<label for="jual_quote" class="col-sm-2 control-label">Sales Lazy Mode</sup></label>
										<div class="col-sm-10">
											<textarea name="jual_lazy" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: jual_lazy"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="jual_quote" class="col-sm-2 control-label">Sales Quotation</sup></label>
										<div class="col-sm-10">
											<textarea name="jual_quote" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: jual_quote"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="jual_order" class="col-sm-2 control-label">Sales Order</sup></label>
										<div class="col-sm-10">
											<textarea name="beli_terima1" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: jual_order"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="jual_delivery" class="col-sm-2 control-label">Delivery Order</sup></label>
										<div class="col-sm-10">
											<textarea name="keterangan" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: jual_delivery"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="jual_invoice" class="col-sm-2 control-label">Invoicing</sup></label>
										<div class="col-sm-10">
											<textarea name="keterangan" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: jual_invoice"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="jual_retur" class="col-sm-2 control-label">Sales Retur</sup></label>
										<div class="col-sm-10">
											<textarea name="jual_retur" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: jual_retur"></textarea>
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
				
				<div id="finance" class="tab-pane">
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
										<label for="cash_keluar" class="col-sm-2 control-label">Cash Keluar</sup></label>
										<div class="col-sm-10">
											<textarea name="cash_keluar" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: cash_keluar"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="cash_masuk" class="col-sm-2 control-label">Cash Masuk</sup></label>
										<div class="col-sm-10">
											<textarea name="cash_masuk" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: cash_masuk"></textarea>
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