
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
								<label for="m_cabang" class="col-sm-4 control-label">Cabang</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-bank"></i></div>
										<select class="form-control" required id="m_cabang" name="m_cabang" placeholder="Cabang" multiple="multiple">
											<?php if(isset($m_cabang)) : ?>
											<?php if (is_array($m_cabang)): ?>
											<?php foreach ($m_cabang as $key => $value) : ?>
											<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="tgl1" class="col-sm-4 control-label">Tanggal</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
										<input type="text" class="form-control" id="tgl1" name="tgl1" placeholder="Tanggal">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="no_faktur" class="col-sm-4 control-label">No Faktur</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-certificate"></i></div>
										<input class="form-control" type="text" id="no_faktur" name="no_faktur" placeholder="No Faktur" >
									</div>
								</div>
							</div>							
							<div class="form-group">
								<label for="status" class="col-sm-4 control-label">Status</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-check"></i></div>
										<select class="form-control" required id="status" name="status" placeholder="Status">
											<option value="">None selected</option>
											<option value="0">Not Completed</option>
											<option value="1">Completed</option>
											<option value="2">Partial</option>
											<option value="3">Cancel</option>
											<option value="4">Delete</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="btn" class="col-sm-4 control-label"></label>
								<div class="col-sm-8">
									<div class="input-group">
										<button class="btn btn-primary" type="submit" id="btn-submit" onclick="validateForm()"><?= $this->lang->line('buat_laporan'); ?></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="row-fluid wrapper invoice" id="toro-area"></div>
				</div>
			</div>