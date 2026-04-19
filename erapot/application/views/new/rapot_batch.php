
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
					<form name="hotlineForm" id="hotlineForm" action="<?php echo base_url("laporan/printrapot"); ?>" onsubmit="return validateForm();" method="post">
						<section class="panel">
						<div class="panel-body">
						<div class="row">
							<input type="hidden" name="cabang" data-bind="value: cabang">
							<div class="col-lg-8 form">	
								<div class="form-group" >
									<label for="supplier">Kelas</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-users"></i></div>
										<input type="text" class="form-control" id="supplier_name" placeholder="Search Kelas">
												<br />
											<input type="hidden" name="primary_sup" data-bind="value: supplier_i" />
									</div>
									
								</div>							
								
							</div>
							<div class="col-lg-4">
								<div class="row">	
								<div class="ui one statistics">
									<div class="statistic">
										<div class="value">
											<button class="btn btn-primary" id="btn-submit" target="_blank" type="submit"><i class="fa fa-print"></i> Print Rapot</button>
											<!--<a href="#" class="btn btn-danger">Clear Form</a>-->
										</div>
									</div>
								</div>	
								</div>	
							</div>
							<input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
							
						
						</div>
						</div>
						</section>
						
						<!--tab nav start-->
						<section class="panel">
							<header class="panel-heading tab-dark">
								<ul class="nav nav-tabs">									
									<li class="active">
										<a data-toggle="tab" href="#contact-1">
											<i class="fa fa-book"></i> 
											Nilai Mapel
										</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#contact-2">
											<i class="fa fa-users"></i> 
											Siswa
										</a>
									</li>
								</ul>
							</header>
							<div class="panel-body">
								<div class="tab-content">
									<div id="contact-1" class="tab-pane active">
									
										<div class="row">
											<div class="col-lg-12">
												<br />
												<input type="hidden" name="primary" data-bind="value: supplier_i" />
												<table class="table table-striped table-hover" id="toro">
													<thead>
														<tr>
															<th>#</th>
															<th>Mapel</th>
															<th>Nilai 1</th>
															<th>Nilai 2</th>
															<th>Nilai PTS</th>
														</tr>
													</thead>
													<tbody data-bind="sortable: organizers">
														<tr>
															<td><span data-bind="text: no"></span></td>
															<td><span data-bind="text: mapel_nama"></span>
															<input type="hidden" data-bind="value: mapel_i" /></td>
															<td>
																<select class="form-control" required data-bind="foreach: nilaiList, value: selectedNilai1, optionsCaption: 'Choose ID Tugas'">
																	<option data-bind="attr: { value: id }, text: id"></option>
																</select>
															</td>
															<td>
																<select class="form-control" required data-bind="foreach: nilaiList, value: selectedNilai2, optionsCaption: 'Choose ID Tugas'">
																	<option data-bind="attr: { value: id }, text: id"></option>
																</select>
															</td>
															<td>
																<select class="form-control" required data-bind="foreach: nilaiList, value: selectedNilai3, optionsCaption: 'Choose ID Tugas'">
																	<option data-bind="attr: { value: id }, text: id"></option>
																</select>
															</td>
															
														</tr>
													</tbody>
												</table>
												<input type="hidden" name="organizers" data-bind="value: ko.toJSON(organizers)" />
											</div>
										</div>
										
									</div>

									
									<div id="contact-2" class="tab-pane ">
										<div class="row">
											<div class="col-lg-12">
												<br />
												<input type="hidden" name="primary" data-bind="value: supplier_i" />
												<table class="table table-striped table-hover" id="toro">
													<thead>
														<tr>
															<th>NIS</th>
															<th>Siswa</th>
															<th>Print</th>
														</tr>
													</thead>
													<tbody data-bind="sortable: organizersiswa">
														<tr>
															<td><span data-bind="text: siswa_nis"></span>
															<td><span data-bind="text: siswa_nama"></span>
															<input type="hidden" data-bind="value: siswa_i" /></td>	
															</td>
															<td><div class="ui toggle checkbox">
																<input type="checkbox" name="status" data-bind="checked: isChecked" />
																<label></label>
															</div>	
															</td>		
														</tr>
													</tbody>
												</table>
												<input type="hidden" name="organizersiswa" data-bind="value: ko.toJSON(organizersiswa)" />
											</div>
										</div>
									</div>
								</div>
							</div>

						</section>
						<!--tab nav start-->
						
						
					</form>
				</div>
			</div>