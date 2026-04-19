
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" data-parsley-validate class="form-horizontal" action="<?php echo base_url("barang"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" method="post">
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
					<a data-toggle="tab" href="#pricing">
						<i class="fa fa-dollar"></i>
						List Cabang
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
										<label for="id_nama" class="col-sm-2 control-label">ID <sup class="text-info">*)</sup> / <?= $this->lang->line('barang_nama'); ?> <sup class="text-info">*)</sup></label>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="ID" required minlength="3" maxlength="50"
												data-bind="value: id" />
										</div>
										
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="<?= $this->lang->line('barang_nama'); ?>" required minlength="3" maxlength="200"
												data-bind="value: nama" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="tipe_barang" class="col-sm-2 control-label"><?= $this->lang->line('barang_tipe_barang'); ?> <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<select class="form-control" name="tipe_barang" required
												data-bind="value: tipeBarang, valueAllowUnset: true, options: $root.availableTipeBarang, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '<?= $this->lang->line('pilih'); ?> <?= $this->lang->line('barang_tipe_barang'); ?>', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="tipe_barang" class="col-sm-2 control-label">Harga Standar<sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="number" class="form-control" placeholder="Harga" required 
												data-bind="value: harga" />
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
										<label for="keterangan" class="col-sm-2 control-label"><?= $this->lang->line('barang_ket'); ?></sup></label>
										<div class="col-sm-10">
											<textarea name="keterangan" class="wysihtml5 form-control" rows="9" 
												data-bind="wysiwyg: keterangan"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label for="keterangan" class="col-sm-2 control-label"></label>
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
				
				<div id="satuan" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addSatuans"><i class="fa fa-plus"></i> Tambah Satuan Convert</a>
							<br />
							<table class="table table-striped table-hover" id="toros">
								<thead>
									<tr>
										<th></th>
										<th>Base</th>
										<th>Satuan Convert</th>
										<th>Value Convert</th>
										<th>Hasil Convert</th>
										<th></th>
									</tr>
								</thead>
								<tbody data-bind="sortable: satuans">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableBase, value: selectedBase, optionsCaption: 'Choose Base'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Base ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableSatuan, value: selectedSatuanConvert, optionsCaption: 'Choose Satuan Convert'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Satuan Convert---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="number" step="0.01" min="1" class="form-control" data-bind="value: value_convert" aria-label=""></td>
										<td  data-bind="text: hasil_convert"></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeSatuan"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addSatuans"><i class="fa fa-plus"></i> Tambah Satuan Convert</a>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
				<div id="grosirs" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" data-bind="click: addGrosirs"><i class="fa fa-plus"></i> Tambah Grosir</a>
							<br />
							<table class="table table-striped table-hover" id="toroc">
								<thead>
									<tr>
										<th></th>
										<th>Membership</th>
										<th>Minimum</th>
										<th>Harga</th>
										<th></th>
									</tr>
								</thead>
								<tbody data-bind="sortable: grosirs">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableMembershipType, value: selectedMembershipType, optionsCaption: 'Choose Membership'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Membership ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="number" required class="form-control" value="" data-bind="value: grosir_minimum" /> </td>
										<td><input type="alphanum" required class="form-control" value="" data-bind="value: grosir_harga" /> </td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeGrosir"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addGrosirs"><i class="fa fa-plus"></i> Tambah Grosir</a>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
				
				<div id="pricing" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							
							<table class="table table-hover" id="toro-boughts">
								<thead>
									<tr>
										<th></th>
										<th>Cabang</th>
										<th>Harga</th>
										<th></th>
									</tr>
								</thead>
								<tbody data-bind="sortable: boughts">
									<tr>
										<td><i class="fa fa-fw fa-list"></i></td>
										<td>
											<select class="form-control" data-bind="foreach: $root.availableCabang, value: selectedCabang, optionsCaption: 'Choose Branch'">
												<option value="" selected data-bind="visible: $index() == 0">--- Pilih Kelas ---</option>
												<option data-bind="attr: { value: id }, text: nama"></option>
											</select>
										</td>
										<td><input type="number" step="0.01" min="0" class="form-control" data-bind="value: bought_harga" aria-label=""></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeBought"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" data-bind="click: addBoughts"><i class="fa fa-plus"></i> Tambah</a>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
						
					</div>
				</div>
				
				<div id="date-3" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-fw fa-search"></i></div>
								<input type="text" class="form-control" id="city" placeholder="Search Goods / Parts">
							</div>
							<br />
							<table class="table table-striped table-hover" id="toro">
								<thead>
									<tr>
										<th>ID / <?= $this->lang->line('barang_kit_kode'); ?></th>
										<th><?= $this->lang->line('barang_nama'); ?></th>
										<th><?= $this->lang->line('barang_kit_qty'); ?></th>
										<th><?= $this->lang->line('satuan'); ?></th>
										<th>Price Ratio</th>
										<th><?= $this->lang->line('barang_kit_ket'); ?></th>
										<th><?= $this->lang->line('action'); ?></th>
									</tr>
								</thead>
								<tbody data-bind="sortable: kits">
									<tr>
										<td data-bind="text: kit_id"></td>
										<td data-bind="text: kit_nama"></td>
										<td><input type="number" step="0.01" required class="form-control" data-bind="value: kit_kuantitas" /></td>
										<td data-bind="text: kit_satuan"></td>
										<td><input type="number" step="0.01" required class="form-control" min="1" max="100" data-bind="value: kit_price_ratio" /></td>
										<td><input class="form-control" data-bind="value: kit_keterangan" minlength="3" maxlength="200" /></td>
										<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeEntity"><i class="fa fa-fw fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Submit</button>
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