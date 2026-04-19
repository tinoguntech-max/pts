
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("m_service"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" method="post">
<div id="page-wrapper" class="wrapper">
	<section class="panel">
		<header class="panel-heading tab-dark tab-right ">
			<ul class="nav nav-tabs pull-right">
				<li class="active">
					<a data-toggle="tab" href="#about-3">
						<i class="fa fa-info"></i>
						General
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#grosirs">
						<i class="fa fa-cubes"></i>
						Grosir
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#date-3">
						<i class="fa fa-cubes"></i>
						Item
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
										<label for="id_name" class="col-sm-2 control-label">ID <sup class="text-info">*)</sup>/ Name <sup class="text-info">*)</sup></label>
										<div class="col-sm-5">
											<input type="alphanum" class="form-control" placeholder="ID" 
												required minlength="3" maxlength="50" data-bind="value: id" />
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Name" 
												required minlength="3" maxlength="200" data-bind="value: nama" />
										</div>
									</div>
									<div class="form-group">
										<label for="service_type" class="col-sm-2 control-label">Service Type / Price </label>
										<div class="col-sm-5">
											<select class="form-control" 
												required data-bind="value: serviceType, valueAllowUnset: true, options: $root.availableServiceType, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Service Type ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
										<div class="col-sm-5">
											<input type="number" class="form-control" placeholder="Price" data-bind="value: harga" />
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
										<label for="keterangan" class="col-sm-2 control-label">Description</sup></label>
										<div class="col-sm-10">
											<textarea name="keterangan" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: keterangan"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-sm-2 control-label"> Status</label>
										<div class="ui toggle checkbox">
											<input type="checkbox" name="status" data-bind="checked: isActive" />
											<label>Active</label>
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
				
				<div id="grosirs" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addGrosirs"><i class="fa fa-plus"></i> Add Grosir</a>
							<br />
							<table class="table table-striped table-hover" id="toroc">
								<thead>
									<tr>
										<th></th>
										<th>Membership</th>
										<th>Minimum</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: grosirs">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableMembershipType, value: selectedMembershipType, optionsCaption: 'Choose Membership'">
												<option value="" selected data-bind="visible: $index() == 0">--- Choose Membership ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="number" required class="form-control" value="" data-bind="value: grosir_minimum" /> </td>
										<td><input type="alphanum" required class="form-control" value="" data-bind="value: grosir_harga" /> </td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeGrosir"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addGrosirs"><i class="fa fa-plus"></i> Add Grosir</a>
							<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
				<div id="date-3" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-fw fa-search"></i></div>
								<input type="text" class="form-control" id="city" placeholder="Search Barang">
							</div>
							<br />
							<table class="table table-striped table-hover" id="toro">
								<thead>
									<tr>
										<th>ID / CODE</th>
										<th>Item Name</th>
										<th>Quantity</th>
										<th>Unit</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody data-bind="sortable: barangs">
									<tr>
										<td data-bind="text: barang_id"></td>
										<td data-bind="text: barang_nama"></td>
										<td><input type="number" step="0.01" required class="form-control" data-bind="value: barang_kuantitas" /></td>
										<td data-bind="text: barang_satuan"></td>
										<td><input class="form-control" data-bind="value: barang_keterangan" /></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeEntity"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
</div>
</form>