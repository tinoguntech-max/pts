
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("m_asset"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" method="post">
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
				<?php if($viewoptions['action'] == 'update') : ?>
				<li class="">
					<a data-toggle="tab" href="#document">
						<i class="fa fa-clone"></i>
						Documents
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#service">
						<i class="fa fa-clone"></i>
						Service
					</a>
				</li>
				<?php endif; ?>
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
										<label for="nama" class="col-sm-2 control-label">Name  <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang" 
												required minlength="3" maxlength="200" data-bind="value: nama" />
										</div>
									</div>
									<div class="form-group">
										<label for="id_m_asset_type" class="col-sm-2 control-label">Asset Type <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<select class="form-control" name="id_m_asset_type" required
												data-bind="foreach: $root.availableAssetType, value: assetType, optionsCaption: 'Choose Asset Type'">
												<option value="" selected data-bind="visible: $index() == 0">--- Asset Type ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="cabang_devisi" class="col-sm-2 control-label">Cabang / Department </label>
										<div class="col-sm-5">
											<select class="form-control" name="id_m_cabang" 
												data-bind="foreach: $root.availableCabang, value: cabang, optionsCaption: 'Choose Cabang'">
												<option value="" selected data-bind="visible: $index() == 0">--- Cabang ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" name="id_m_department" 
												data-bind="foreach: $root.availableDepartment, value: divisi, optionsCaption: 'Choose Department'">
												<option value="" selected data-bind="visible: $index() == 0">--- Department ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="tanggal" class="col-sm-2 control-label">Tanggal <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" 
												required data-bind="value: tanggal" />
										</div>
									</div>
									<div class="form-group">
										<label for="besar" class="col-sm-2 control-label">Besar <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="number" class="form-control" id="besar" name="besar" placeholder="Besar Barang" 
												required data-bind="value: besar" />
										</div>
									</div>
									<div class="form-group">
										<label for="supplier_depreciation" class="col-sm-2 control-label"> Suplier / Depreciation <sup class="text-info">*)</sup></label>
										<div class="col-sm-5">
											<select class="form-control" name="id_supplier" 
												data-bind="foreach: $root.availableSupplier, value: supplier, optionsCaption: 'Choose Supplier'">
												<option value="" selected data-bind="visible: $index() == 0">--- Supplier ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
										<div class="col-sm-5">
											<select class="form-control" name="id_m_depreciation_year" required
												data-bind="foreach: $root.availableDepreciationYear, value: depreciationYear, optionsCaption: 'Choose Depreciation Year'">
												<option value="" selected data-bind="visible: $index() == 0">--- Depreciation Year ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
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
										<label for="keterangan" class="col-sm-2 control-label">Description</sup></label>
										<div class="col-sm-10">
											<textarea class="wysihtml5 form-control" id="keterangan" name="keterangan" rows="9" 
												data-bind="value: keterangan"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="status" class="col-sm-2 control-label">Retired</sup></label>
										<div class="col-sm-10 icheck-row">
											<input class="icheckbox_square-green" type="checkbox" id="status" name="status" value="1" data-bind="checked: isActive" />
										</div>
									</div>
									<div class="form-group" data-bind="if: isActive">
										<label for="salvage_alasan" class="col-sm-2 control-label">Salvage / Alasan <sup class="text-info"></sup></label>
										<div class="col-sm-5">
											<input type="number" class="form-control" id="salvage_value" name="salvage_value" placeholder="Salvage Value" 
												data-bind="value: salvage_value" />
										</div>
										<div class="col-sm-5">
											<select class="form-control" name="alasan" 
												data-bind="foreach: $root.availableAlasan, value: alasan, optionsCaption: 'Choose Reason'">
												<option value="" selected data-bind="visible: $index() == 0">--- Reason ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</div>
									</div>
									
									<div class="form-group " data-bind="if: isActive">
										<label for="tgl_retire" class="col-sm-2 control-label">Tanggal Retire <sup class="text-info"></sup></label>
										<div class="col-sm-10">
											<input type="date" class="form-control" id="tgl_retire" name="tgl_retire" placeholder="Tangal Retire" 
												 data-bind="value: tgl_retire" />
										</div>
										
									</div>
									<div class="form-group" data-bind="if: isActive">
										<label for="keterangan_retire" class="col-sm-2 control-label">Keterangan Retire <sup class="text-info"></sup></label>
										
										<div class="col-sm-10">
											<textarea class="wysihtml5 form-control" id="keterangan_retire" name="keterangan_retire" rows="9" 
												data-bind="value: keterangan_retire"></textarea>
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
				
				<?php if($viewoptions['action'] == 'update') : ?>
				<div id="document" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addDocuments"><i class="fa fa-plus"></i> Tambah Documents</a>
							<br />
							<table class="table table-striped table-hover" id="toroh">
								<thead>
									<tr>
										<th></th>
										<th>Nama </th>
										<th>Keterangan</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: documents">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td><input type="text" class="form-control" required data-bind="value: document_nama" /></td>
										<td><input type="text" class="form-control" required data-bind="value: document_keterangan" /></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeDocument"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="documents" data-bind="value: ko.toJSON(documents)" />
							<a class="btn btn-primary" data-bind="click: addDocuments"><i class="fa fa-plus"></i> Tambah Documents</a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
				<div id="service" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" onclick="add_service()"><i class="fa fa-plus"></i> Add Service</a>
							<a class="btn btn-default" onclick="service_reload_table()"><i class="fa fa-refresh"></i> Reload</a>
							<br />
							<br />
							<table id="asset-service-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Keterangan</th>
										<th style="width:125px;">Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
					 
								<tfoot>
								<tr>
									<th>Keterangan</th>
									<th>Action</th>
								</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<?php endif; ?>
				
			</div>
		</div>
	</section>
	
</div>
</form>