
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
									<label for="m_cabang" class="col-sm-4 control-label"> Kelas</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-fw fa-bank"></i></div>
											<select class="form-control" required id="m_kelas" name="m_kelas" placeholder="Kelas" multiple="multiple">
												<?php if(isset($m_kelas)) : ?>
												<?php if (is_array($m_kelas)): ?>
												<?php foreach ($m_kelas as $key => $value) : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="murid" class="col-sm-4 control-label"> Murid</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-fw fa-users"></i></div>
											<select class="form-control" required id="murid" name="murid" placeholder="Murid" multiple="multiple">
												<?php if(isset($murid)) : ?>
												<?php if (is_array($murid)): ?>
												<?php foreach ($murid as $key => $value) : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="murid" class="col-sm-4 control-label"> Tahun</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
											<select class="form-control" required id="tahun" name="tahun" placeholder="Tahun">
												<option value="<?= date('Y') ?>"><?= date('Y') ?></option>
												<option value="<?= date('Y')-1 ?>"><?= date('Y')-1 ?></option>
												<option value="<?= date('Y')-2 ?>"><?= date('Y')-2 ?></option>
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