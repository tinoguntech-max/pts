
				<!-- page head start-->
	            <div class="page-head">
	                <h3>
	                    <?= HEADER_IDENTITY ?>
	                </h3>
	                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
	            </div>
	            <!-- page head end-->
				
				<!-- main content -->
				
				<div id="page-wrapper">
					<div class="container-fluid panel">
						<div class="toro">
						<div id="error-area"></div>
						<br>
						<div class="row">
							<div class="col-lg-12 form-horizontal">
								<div class="form-group">
									<label for="kelas" class="col-sm-4 control-label"> Kelas</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-fw fa-file"></i></div>
											<select class="form-control" required id="kelas" name="kelas" placeholder="Pilih Kelas" >
												<?php if(isset($kelas)) : ?>
												<?php if (is_array($kelas)): ?>
												<?php foreach ($kelas as $key => $value) : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tgl1" class="col-sm-4 control-label"> Tanggal</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
											<input type="text" class="form-control" id="tgl1" name="tanggal" placeholder=" Date">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="btn" class="col-sm-4 control-label"></label>
									<div class="col-sm-8">
										<div class="input-group">
											<button class="btn btn-primary" type="submit" id="btn-submit" onclick="validateForm()">Buat Laporan</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						<div class="row-fluid wrapper invoice" id="toro-area"></div>
					</div>
				</div>