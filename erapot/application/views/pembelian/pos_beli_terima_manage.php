
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
					<form name="hotlineForm" id="hotlineForm" action="<?php echo base_url("pos_beli_terima_manage"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" onsubmit="return validateForm();" method="post">
						<section class="panel">
						<div class="panel-body">
						<div class="row">
							<input type="hidden" name="cabang" data-bind="value: cabang">
							<div class="col-lg-6 form">	
								<div class="form-group" >
									<label for="supplier">Murid</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-child"></i></div>
										<input type="text" class="form-control" id="supplier_name" placeholder="Search Murid">
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
													</br>
													<span data-bind="text: sup_kelas"></span>
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
							<input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
							
							<!--<div class="col-lg-3">
								<div class="row">									
									<div class="ui one statistics">
										<div class="statistic">
											<div class="value">
												<i class="fa fa-dollar"></i> <span data-bind="text: totalSub">0</span>
											</div>
											<div class="label">
												Total SPP
											</div>
										</div>
										<div class="statistic">
											<div class="value">
												<i class="fa fa-dollar"></i> <span data-bind="text: totalSublain">0</span>
											</div>
											<div class="label">
												Total Lain Lain
											</div>
										</div>
									</div>
								</div>	
							</div>-->
							<div class="col-lg-6">
								<div class="row">									
									<div class="ui one statistics">
										<div class="statistic">
											<div class="value">
												<i class="fa fa-dollar"></i> <span data-bind="text: totalSublain">0</span>
											</div>
											<div class="label">
												Sub Total
											</div>
										</div>
									</div>
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
						</div>
						</section>
						
						<!--tab nav start-->
						<section class="panel">
							<header class="panel-heading tab-dark">
								<ul class="nav nav-tabs">
									<!--<li >
										<a data-toggle="tab" href="#about-2">
											<i class="fa fa-cubes"></i> 
											SPP
										</a>
									</li>-->
									<li class="active">
										<a data-toggle="tab" href="#contact-1">
											<i class="fa fa-cubes"></i> 
											Lain Lain
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
									<div id="about-2" class="tab-pane">
									
										<div class="row">
											<div class="col-lg-12">
												<br />
												<input type="hidden" name="primary" data-bind="value: supplier_i" />
												<table class="table table-striped table-hover" id="toro">
													<thead>
														<tr>
															<th>#</th>
															<th>Bulan</th>
															<th>Jumlah Pembayaran</th>
															<th>Bayar</th>
															<th>Print Nota</th>
														</tr>
													</thead>
													<tbody data-bind="sortable: organizers">
														<tr>
															<td><span data-bind="text: no"></td>
															<td><span data-bind="text: pos_nama"></span>
															<input type="hidden" data-bind="value: barang_i" /></td>
															<td data-bind="visible: status() == 0">
																<span data-bind="visible: isChecked">
																	<span style="font-family: Meiryo UI;" data-bind="text: pos_harga_rp"></span>
																</span>
																<span data-bind="visible: isChecked() == false">
																	<span style="font-family: Meiryo UI;"><i>Belum ada Pembayaran</i> </span>
																</span>
															</td>
															<td data-bind="visible: status() == 1">
																<span style="font-family: Meiryo UI;" data-bind="text: pos_harga_rp"></span>
															</td>
															<td data-bind="visible: status() == 0">																
																<div class="ui toggle checkbox">
																	<input type="checkbox" name="status" data-bind="checked: isChecked" />
																	<label>Bayar</label>
																</div>																
															</td>
															<td data-bind="visible: status() == 1">
																<span style="font-family: Meiryo UI;">Lunas </span>
															</td>
															<td><a class="btn btn-info"  title="Print Nota" href="#" data-bind="click: $root.removeEntity"><i class="fa fa-fw fa-print"></i></a></td>
														</tr>
													</tbody>
												</table>
												<input type="hidden" name="organizers" data-bind="value: ko.toJSON(organizers)" />
											</div>
										</div>
										
									</div>

									<div id="contact-1" class="tab-pane active">
									
										<div class="row">
											<div class="col-lg-12">
												<br />
												<input type="hidden" name="primary" data-bind="value: supplier_i" />
												<table class="table table-striped table-hover" id="toro">
													<thead>
														<tr>
															<th>#</th>
															<th>Jenis Pembayaran</th>
															<th>Jumlah Pembayaran</th>
															<th>Nominal</th>
															<th>Bayar</th>
															<th>History</th>
														</tr>
													</thead>
													<tbody data-bind="sortable: organizerslain">
														<tr>
															<td><span data-bind="text: nolain"></td>
															<td><span data-bind="text: pos_namalain"></span>
															<input type="hidden" data-bind="value: barang_ilain" /></td>
															<td data-bind="visible: statuslain() == 0">
																<span data-bind="visible: isCheckedlain">
																	<input type="number"  min="0" class="form-control" data-bind="value: pos_hargalain, attr: { id: pos_namalain }" />
																</span>
																<span data-bind="visible: isCheckedlain() == false">
																	<span style="font-family: Meiryo UI;"><i>Belum ada Pembayaran</i> </span>
																</span>
															</td>
															<td data-bind="visible: statuslain() == 1">
																<span style="font-family: Meiryo UI;" data-bind="text: pos_harga_rplain"></span>
															</td>
															<td>
																<span style="font-family: Meiryo UI;" data-bind="text: nominal"></span>
															</td>
															<td data-bind="visible: statuslain() == 0">
																<div class="ui toggle checkbox">
																	<input type="checkbox" name="status" data-bind="checked: isCheckedlain" />
																	<label>Bayar</label>
																</div>
															</td>
															<td data-bind="visible: statuslain() == 1">
																<span style="font-family: Meiryo UI;">Lunas </span>
															</td>
															<td><a target="_blank" data-bind="attr: { href: URLPath }">Open file</a></td>
															<!--<td><a class="btn btn-info"  title="Print Nota" href="#" data-bind="click: $root.removeEntity"><i class="fa fa-fw fa-print"></i></a></td> -->
														</tr>
													</tbody>
												</table>
												<input type="hidden" name="organizerslain" data-bind="value: ko.toJSON(organizerslain)" />
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