
			<!-- page head start-->
            <div class="page-head">
                <h3>
                    <?= HEADER_IDENTITY ?>
                </h3>
                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
            </div>
            <!-- page head end-->
			
			<!-- main content -->
			<div id="page-wrapper" class="wrapper">
				<div class="container-fluid">
					<br/>
					<div id="error-area"></div>
					<form name="hotlineForm" action="<?php echo base_url("pos_beli_terima"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" onsubmit="return validateForm();" method="post">
						<section class="panel">
						<div class="panel-body">
						<div class="row">
							<div class="col-lg-4 form">
								<div class="form-group">
									<label for="m_cabang">Branch</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-building"></i></div>
										<select class="form-control" 
												required data-bind="value: cabang, valueAllowUnset: true, options: $root.availableCabang, 
												optionsText: 'nama', optionsValue: 'id', select2: { placeholder: '--- Choose Branch ---', 
													allowClear: true, theme: 'bootstrap' }">
											</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4 form">	
								<div class="form-group" >
									<label for="supplier">Supplier</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-child"></i></div>
										<input type="text" class="form-control" id="supplier_name" placeholder="Search Supplier">
												<br />
											<input type="hidden" name="primary_sup" data-bind="value: supplier_i" />
									</div>
									<div class="" id="supplier-area" data-bind="if: supplier_i">
										<div class="ui one cards">
											<div class="card">
												<div>
													<img class="right floated mini ui image" src="<?= base_url('img/elliot.jpg') ?>">
													<div class="header">
													<span data-bind="text: sup_nik"></span>
													</br>
													<span data-bind="text: sup_nama"></span>
													</div>
													<div class="meta">
													<span data-bind="text: sup_alamat"></span>
													</div>
													<div class="description">
													<span data-bind="text: sup_telp"></span>
													</div>
												</div>
												<!--<div class="extra content">
													<div class="ui two buttons">
														<div class="ui basic green button">Approve</div>
														<div class="ui basic red button">Decline</div>
													</div>
												</div>-->
											</div>
										</div>
									</div>
								</div>							
								
							</div>
							
							<div class="col-lg-4">
								<div class="row">
									<div class="ui two statistics">
										<div class="statistic">
											<div class="value">
												<i class="fa fa-cube"></i> <span data-bind="text: organizers().length">0</span>
											</div>
											<div class="label">
												Jumlah Barang
											</div>
										</div>
										<div class="statistic">
											<div class="value">
												<i class="fa fa-cubes"></i> <span data-bind="text: jumlahBarang">0</span>
											</div>
											<div class="label">
												Total Barang
											</div>
										</div>
									</div>
									
									<div class="ui one statistics">
										<div class="statistic">
											<div class="value">
												<i class="fa fa-dollar"></i> <span data-bind="text: totalSub">0</span>
											</div>
											<div class="label">
												Total Pembayaran
											</div>
										</div>
									</div>
								<input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
								<div class="ui one statistics">
									<div class="statistic">
										<div class="value">
											<button class="btn btn-primary" id="btn-submit" type="submit"><i class="fa fa-hdd-o"></i> <?= $this->lang->line('simpan'); ?></button>
											<!--<a href="#" class="btn btn-danger">Clear Form</a>-->
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						</section>
						
						<!--tab nav start-->
						<section class="panel">
							<header class="panel-heading tab-dark">
								<ul class="nav nav-tabs">
									<li class="active">
										<a data-toggle="tab" href="#about-2">
											<i class="fa fa-cubes"></i> 
											Detil
										</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#contact-2">
											<i class="fa fa-envelope-o"></i> 
											Pesan
										</a>
									</li>
								</ul>
							</header>
							<div class="panel-body">
								<div class="tab-content">
									<div id="about-2" class="tab-pane active">
									
										<div class="row">
											<div class="col-lg-12">
												<div class="input-group">
													<div class="input-group-addon"><i class="fa fa-fw fa-search"></i></div>
													<input type="text" class="form-control" id="city" placeholder="Pilih Pembayaran">
												</div>
												<br />
												<input type="hidden" name="primary" data-bind="value: supplier_i" />
												<table class="table table-striped table-hover" id="toro">
													<thead>
														<tr>
															<th>#</th>
															<th>Item</th>
															<th>Harga</th>
															<th>Qty</th>
															<th>Disc %</th>
															<!--<th>Tax %</th>-->
															<th>Sub</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody data-bind="sortable: organizers">
														<tr>
															<td></td>
															<td><span data-bind="text: pos_nama"></span>
															<input type="hidden" data-bind="value: barang_i" /></td>
															<td><input type="number"  min="0" class="form-control" data-bind="value: pos_harga" /></td><td>
															<div class="input-group">
																	<input type="number" step="0.01" required min="0.01" class="form-control" data-bind="value: pos_jumlah" />
																	<div class="input-group-addon" data-bind="text: satuan">
																</div>
															</td>
															<td><input type="number" step="0.01" min="0" max="100" class="form-control" data-bind="value: pos_discount" /></td>
															<!--<td><input type="number" step="0.01" min="0" max="100" class="form-control" data-bind="value: pos_tax" /></td>-->
															<td data-bind="text: sub"></td>
															<td><a class="btn btn-danger" href="#" data-bind="click: $root.removeEntity"><i class="fa fa-fw fa-trash"></i></a></td>
														</tr>
													</tbody>
												</table>
												<input type="hidden" name="organizers" data-bind="value: ko.toJSON(organizers)" />
											</div>
										</div>
										
									</div>
									<div id="contact-2" class="tab-pane ">
										<textarea name="keterangan" class="wysihtml5 form-control" rows="9" 
											data-bind="wysiwyg: keterangan"></textarea>
									</div>
								</div>
							</div>
						</section>
						<!--tab nav start-->
						
						
					</form>
				</div>
			</div>