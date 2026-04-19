
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
									<label for="siswa" class="col-sm-4 control-label"> Siswa</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-fw fa-user"></i></div>
											<select class="form-control" required id="siswa" name="siswa" placeholder="Pilih Siswa">
												<?php if(isset($siswa)) : ?>
												<?php if (is_array($siswa)): ?>
												<?php foreach ($siswa as $key => $value) : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tugas" class="col-sm-4 control-label"> Tugas</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-fw fa-file"></i></div>
											<select class="form-control" required id="tugas" name="tugas" placeholder="Pilih Tugas" multiple="multiple">
												<?php if(isset($tugas)) : ?>
												<?php if (is_array($tugas)): ?>
												<?php foreach ($tugas as $key => $value) : ?>
												<option value="<?= $value['id'] ?>"><?= $value['id'] ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
											</select>
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