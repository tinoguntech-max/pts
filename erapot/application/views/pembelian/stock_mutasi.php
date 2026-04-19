
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
					<form name="hotlineForm" action="<?php echo base_url("stock_mutasi"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" onsubmit="return validateForm();" method="post">
						<div class="row">
							<div class="col-lg-8 form-horizontal">
								<div class="form-group">
									<label for="m_cabang" class="col-sm-4 control-label">Cabang Pembuat</label>
									<div class="col-sm-8">
										<div class="input-group select2-bootstrap-prepend">
											<div class="input-group-addon"><i class="fa fa-fort-awesome"></i></div>
											<select required class="form-control select2" id="m_cabang" name="m_cabang" onchange="cabang_selected()">
												<optgroup label="CABANG PENGIRIM">
												<?php if(isset($m_cabang)) : ?>
												<?php if (is_array($m_cabang)): ?>
												<?php foreach ($m_cabang as $key => $value) : ?>
												<?php if ($value['id'] != 0) : ?>
												<?php if(isset($detil)) : if($detil[0]['id_m_cabang'] == $value['id']) : ?>
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
									<label for="m_cabang_tujuan" class="col-sm-4 control-label">Cabang Tujuan</label>
									<div class="col-sm-8">
										<div class="input-group select2-bootstrap-prepend">
											<div class="input-group-addon"><i class="fa fa-fort-awesome"></i></div>
											<select required class="form-control select2" id="m_cabang_tujuan" name="m_cabang_tujuan" disabled>
												<optgroup label="CABANG TUJUAN">
												<?php if(isset($m_cabang_tujuan)) : ?>
												<?php if (is_array($m_cabang_tujuan)): ?>
												<?php foreach ($m_cabang_tujuan as $key => $value) : ?>
												<?php if ($value['id'] != 0) : ?>
												<?php if(isset($detil)) : if($detil[0]['id_m_cabang_tujuan'] == $value['id']) : ?>
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
									<label for="tanggal_buat" class="col-sm-4 control-label">Tanggal Buat</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											<input type="text" class="form-control" id="tanggal_buat" name="tanggal_buat" disabled
											value="<?php if (isset($detil)) echo ($detil[0]['tanggal_buat']);
												else echo date('Y-m-d'); ?>" placeholder="Tanggal Buat">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal_diperlukan" class="col-sm-4 control-label">Tanggal Pengiriman</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											<input type="text" class="form-control" id="tanggal_diperlukan" name="tanggal_diperlukan" disabled
											value="<?php if (isset($detil)) echo ($detil[0]['tanggal_kirim']);
												else echo date('Y-m-d'); ?>" placeholder="Tanggal Pengiriman">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="keterangan" class="col-sm-4 control-label">Keterangan</label>
									<div class="col-sm-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-folder"></i></div>
											<textarea rows="3" class="form-control" id="keterangan1" name="keterangan1">
												<?php if (isset($detil)) echo ($detil[0]['keterangan']); ?>
											</textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<dl class="dl-horizontal">
									<dt>Total Jenis Part</dt>
									<dd id="total-jenis">0</dd>
									<dt>Total Part</dt>
									<dd id="total-part">0</dd>
								</dl>
								
								<button class="btn btn-primary" id="btn-submit" type="submit"><i class="fa fa-hdd-o"></i> Simpan Data</button>
								<a href="#" class="btn btn-danger">Clear Form</a>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-lg-12">
								<div class="input-group" id="motor-control">
									<div class="input-group-addon"><i class="fa fa-gears"></i></div>
									<input type="text" class="form-control" id="city" placeholder="Scan Barang (Part)" disabled>
								</div>
								<br />
								<table class="table table-striped table-hover" id="toro">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode</th>
											<th>Nama</th>
											<th style="width:90px;">Jumlah</th>
											<th style="width:30px;">Satuan</th>
											<th>Stock Pengirim</th>
											<th>Stock Tujuan</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody id="toro-body">
										<?php if (isset($detils)): ?>
										<?php if (is_array($detils)): $a=0; ?>
										<?php foreach ($detils as $key => $value) : $a++; ?>
										<tr id="t-<?= $a ?>">
											<td id="t0-<?= $a ?>"><?= $a ?></td>
											<td id="t1-<?= $a ?>"><?= $value['id_barang'] ?></td>
											<td id="t2-<?= $a ?>"><?= get_barang($value['id_barang']) ?>
												<input type="hidden" name="ids[<?= $a-1 ?>]" value="<?= $value['id_barang'] ?>"></td>
											<td id="t5-<?= $a ?>">
												<input class="form-control" type="number" name="banyak[<?= $a-1 ?>]" step="0.01" required value="<?= $value['kuantitas'] ?>"></td>
											<td id="t6-<?= $a ?>"><?= get_barang_satuan($value['id_barang']) ?></td>
											<td id="t7-<?= $a ?>">
												<input class="form-control" type="text" name="keterangan[<?= $a-1 ?>]" value="<?= $value['keterangan'] ?>"></td>
											<td id="t8-<?= $a ?>"></td>
											<td id="t9-<?= $a ?>"></td>
											<td id="t10-<?= $a ?>">
												<a class="btn btn-danger" href="#" onclick="deleted(<?= $a ?>);"><i class="fa fa-trash"></i></a></td>
										</tr>
										<?php endforeach; ?>
										<?php endif; ?>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div>