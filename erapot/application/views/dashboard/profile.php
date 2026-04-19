
			<!-- page head start-->
            <div class="page-head">
                <h3>
                    iC Solutions
                </h3>
                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
            </div>
            <!-- page head end-->
			
			<!-- main content -->
			<div id="page-wrapper" class="wrapper">
				<div class="container-fluid panel">
					<br />
					<div id="error-area"></div>
					<form name="profileForm" action="<?php echo base_url("profile"); ?>/<?php echo $viewoptions['action']; ?>" onsubmit="return validateForm();" method="post">
						<div class="row">
							<div class="col-lg-12 form-horizontal">
								<div class="form-group">
									<label for="nama" class="col-sm-3 control-label">Nama</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-user"></i></div>
											<input type="text" class="form-control" id="nama" name="nama" 
											data-bind="value: nama" placeholder="Nama" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="alamat" class="col-sm-3 control-label">Alamat</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											<input type="text" class="form-control" id="alamat" name="alamat" 
											data-bind="value: alamat" placeholder="Alamat" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="telp" class="col-sm-3 control-label">No Telepon</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											<input type="text" class="form-control" id="telp" name="telp" 
												data-bind="value: telp" placeholder="Nomor Telephone" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-sm-3 control-label">Email</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											<input type="text" class="form-control" id="email" name="email" 
												data-bind="value: email" placeholder="Email" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="pendidikan" class="col-sm-3 control-label">Pendidikan Terakhir</label>
									<div class="col-sm-9">
										<div class="input-group select2-bootstrap-prepend">
										<div class="input-group-addon"><i class="fa fa-fort-awesome"></i></div>
											<select class="form-control select2" id="m_pendidikan_terakhir" name="goldar" placeholder="Golongan Darah">
												<?php if(isset($m_pendidikan_terakhir)) : ?>
												<?php if (is_array($m_pendidikan_terakhir)): ?>
												<?php foreach ($m_pendidikan_terakhir as $key => $value) : ?>
												<?php if ($value['id'] != 0) : ?>
												<?php if(isset($detil)) : if($detil[0]['m_pendidikan_terakhir'] == $value['id']) : ?>
												<option value="<?= $value['id'] ?>" selected><?= $value['nama'] ?></option>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
												</optgroup>
											</select>
										</div>
										</div>
									</div>
								<div class="form-group">
									<label for="agama" class="col-sm-3 control-label">Agama</label>
									<div class="col-sm-9">
										<div class="input-group select2-bootstrap-prepend">
										<div class="input-group-addon"><i class="fa fa-fort-awesome"></i></div>
											<select class="form-control select2" id="m_agama" name="goldar" placeholder="Golongan Darah">
												<?php if(isset($m_agama)) : ?>
												<?php if (is_array($m_agama)): ?>
												<?php foreach ($m_agama as $key => $value) : ?>
												<?php if ($value['id'] != 0) : ?>
												<?php if(isset($detil)) : if($detil[0]['m_agama'] == $value['id']) : ?>
												<option value="<?= $value['id'] ?>" selected><?= $value['nama'] ?></option>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
												</optgroup>
											</select>
										</div>
										</div>
									</div>
								<div class="form-group">
									<label for="m_golongan_darah" class="col-sm-3 control-label">Golongan Darah</label>
									<div class="col-sm-9">
										<div class="input-group select2-bootstrap-prepend">
										<div class="input-group-addon"><i class="fa fa-fort-awesome"></i></div>
											<select class="form-control select2" id="m_golongan_darah" name="goldar" placeholder="Golongan Darah">
												<?php if(isset($m_golongan_darah)) : ?>
												<?php if (is_array($m_golongan_darah)): ?>
												<?php foreach ($m_golongan_darah as $key => $value) : ?>
												<?php if ($value['id'] != 0) : ?>
												<?php if(isset($detil)) : if($detil[0]['m_golongan_darah'] == $value['id']) : ?>
												<option value="<?= $value['id'] ?>" selected><?= $value['nama'] ?></option>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
												</optgroup>
											</select>
										</div>
										</div>
									</div>
								<div class="form-group">
									<label for="m_kewarganegaraan" class="col-sm-3 control-label">Kewarganegaraan</label>
									<div class="col-sm-9">
										<div class="input-group select2-bootstrap-prepend">
										<div class="input-group-addon"><i class="fa fa-fort-awesome"></i></div>
											<select class="form-control select2" id="m_kewarganegaraan" name="m_kewarganegaraan" placeholder="Kewarganegaraan">
												<?php if(isset($m_kewarganegaraan)) : ?>
												<?php if (is_array($m_kewarganegaraan)): ?>
												<?php foreach ($m_kewarganegaraan as $key => $value) : ?>
												<?php if ($value['id'] != 0) : ?>
												<?php if(isset($detil)) : if($detil[0]['id_m_kewarganegaraan'] == $value['id']) : ?>
												<option value="<?= $value['id'] ?>" selected><?= $value['nama'] ?></option>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
												</optgroup>
											</select>
										</div>
										</div>
								</div>
								<div class="form-group">
									<label for="m_status_kawin" class="col-sm-3 control-label">Status Perkawinan</label>
									<div class="col-sm-9">
										<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fort-awesome"></i></div>
											<select class="form-control select2" id="m_status_kawin" name="m_status_kawin" placeholder="Status Perkawinan">
												<?php if(isset($m_status_kawin)) : ?>
												<?php if (is_array($m_status_kawin)): ?>
												<?php foreach ($m_status_kawin as $key => $value) : ?>
												<?php if ($value['id'] != 0) : ?>
												<?php if(isset($detil)) : if($detil[0]['id_m_status_kawin'] == $value['id']) : ?>
												<option value="<?= $value['id'] ?>" selected><?= $value['nama'] ?></option>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php else : ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
												<?php endif; ?>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
												</optgroup>
											</select>
										</div>
										</div>
									</div>
							</div>
							<div class="form-group">
								<label for="btn" class="col-sm-4 control-label"></label>
								<div class="col-sm-8">
									<div class="input-group">
										<button class="btn btn-primary" id="btn-submit" type="submit"><i class="fa fa-hdd-o"></i> Simpan Data</button>
										<a href="#" class="btn btn-danger">Cancel</a>
									</div>
								</div>
							</div>
								
							</div>
						

					</form>
				</div>
			</div>