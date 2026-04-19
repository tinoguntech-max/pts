
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
						Aset
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
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Aset"
												required minlength="3" maxlength="200" data-bind="value: nama" />
										</div>
									</div>
                  <div class="form-group">
										<label for="kode" class="col-sm-2 control-label">Kode <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode"
												required minlength="3" maxlength="200" data-bind="value: nama" />
										</div>
									</div>
									<div class="form-group">
										<label for="asset" class="col-sm-2 control-label">Jenis Aset <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<select class="form-control" name="asset_type" required
												data-bind="foreach: $root.availableAssetType, value: assetType, optionsCaption: 'Choose Asset Type'">
												<option value="" selected data-bind="visible: $index() == 0">--- Tipe Aset ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="division" class="col-sm-2 control-label">Jenis Divisi <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<select class="form-control" name="divisi_type" required
												data-bind="foreach: $root.availableDivisi, value: divisiType, optionsCaption: 'Choose Division Type'">
												<option value="" selected data-bind="visible: $index() == 0">--- Jenis Divisi ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="date" class="col-sm-2 control-label">Tanggal</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Telp Customer"
												minlength="3" maxlength="10" data-bind="value: tanggal" />
										</div>
									</div>
									<div class="form-group">
										<label for="besar" class="col-sm-2 control-label">Besar</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="besar" name="besar" placeholder="Email" data-parsley-trigger="change"
												maxlength="100" data-bind="value: besar" />
										</div>
									</div>
                  <div class="form-group">
										<label for="supplier" class="col-sm-2 control-label">Pemasok <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<select class="form-control" name="supplier" required
												data-bind="foreach: $root.availableSupplier, value: supplier, optionsCaption: 'Choose Supplier'">
												<option value="" selected data-bind="visible: $index() == 0">--- Supplier ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
                  <div class="form-group">
										<label for="depresiasi" class="col-sm-2 control-label">Tahun Depresiasi <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<select class="form-control" name="depresiasi" required
												data-bind="foreach: $root.availableDepreciationYear, value: depresiasi, optionsCaption: 'Choose Customer Type'">
												<option value="" selected data-bind="visible: $index() == 0">--- Customer Type ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-sm-2 control-label">Keterangan</sup></label>
										<div class="col-sm-10">
											<textarea class="wysihtml5 form-control" id="keterangan" name="keterangan" rows="9"
												data-bind="value: keterangan"></textarea>
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
			</div>
		</div>
	</section>

</div>
</form>
